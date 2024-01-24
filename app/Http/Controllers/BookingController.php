<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use Carbon\Carbon;
use Illuminate\Broadcasting\Broadcasters\PusherBroadcaster;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Pusher\Pusher;

class BookingController extends Controller
{
    //
    public function getDoctor(){
        $data=BookingModel::getAllDoctor();

        return view('user.appointment.booking',['datadoctor'=>$data]);
    }


    public function insertAppointment(Request $request){
        $id=$request->input('id_user');
        $id_doctor=$request->input('id_doctor');

        $date=$request->input('date');
        $time=$request->input('time');

        $times=explode("-",$time);


        $time_start=$times[0];

        $time_end= $times[1];


        $startTime = Carbon::parse(str_replace(array('am', 'pm'), ':00',$time_start));
        $endTime = Carbon::parse(str_replace(array('am', 'pm'), ':00',$time_end));
        
       


        $timeExists = DB::table('appointment')
                        ->where('date', $date)
                        ->where('id_doctor', $id_doctor)
                        ->where('time_start','>=', $startTime)
                        ->where('time_end','<=', $endTime)
                        ->exists(); 


            $date1=Carbon::parse($date)->format('d/m/Y');       
            if($timeExists){
                    $themesage = "Bác sĩ bạn vừa chọn đã có lịch hẹn từ $time_start đến $time_end vào ngày $date1
                            Vui Lòng Chọn Giờ hẹn khác hoặc bác sĩ khác
                    ";
                    return redirect('user/appointment/booking')->withErrors(['msg' => $themesage])->with('success',$date)->with('success1',$time);
               }

        $purpose=$request->input('purpose');


        $rs=BookingModel::insertAppointment($id,$id_doctor,$date,$time_start,$time_end,$purpose);

        
        
        if($rs ==false){
            return "Thêm Thất Bại";
        }else{


        //  $data['title'] = $request->input('title');
        //  $data['content'] = $request->input('content');



        $options = array(
            'cluster' => 'mt1',
            'encrypted' => true
        );

        
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $data['message'] = 'Có Người Đặt Lịch Hẹn Hãy Xem Ngay';
        $pusher->trigger('notify-channel','Notify',$data);

        return redirect()->route('checkout', ['id'=>$rs])->with('message','Đặt lịch hẹn thành công');

        }

    }
    


    public function checkOut($id){

        $data= BookingModel::dataCheckOut($id);
    
       return view('user.appointment.checkout',['data_appointment'=>$data]);
    }





    public function lichsuBooking($id){
        $databooking= BookingModel::lichsuBooking($id);
    
        return view('user.appointment.lichsubooking',['databooking'=>$databooking]);
    }


    public function cancelBooking($id_user,$id){


        $rs=BookingModel::cancelBooking($id);

        // $id_user=BookingModel::getiduser($id);

       
        if($rs==false){
            return "Xóa Thất Bại";
        }else{
            return redirect()->route('lichsubooking', ['id' => $id_user]);
        }
    }


    public function checkapppointment($id){
        $rs=DB::table('appointment')
            ->join('doctors', 'appointment.id_doctor', '=', 'doctors.id_doctor')
            ->join('users', 'appointment.id_user', '=', 'users.id')
            ->select('users.*', 'appointment.*','doctors.*')
            ->where('appointment.id',$id)
            ->get();

        return view('user.appointment.checkappointment',['databooking'=>$rs]);
    }

    public function checkphanhoi($id){
        $rs =DB::table('phanhoi')->where('id_phanhoi',$id)->get();
        return view('user.appointment.checkphanhoi',['dataphanhoi'=>$rs]);
    }
    

}
