<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use App\Models\CustomerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use PhpParser\Comment\Doc;
use PhpParser\Node\Stmt\If_;

class HomeController extends Controller
{
    //
    public function redirect()
    {
        if(Auth::id()){
            if(Auth::user()->usertype=='0'){
                return view('user.home');
            }else{
                return redirect('assets/user/list');
            }
        }
        else{
            return redirect()->back();
        }
    }

    public function index(){
        return view('user.home');
    }

    public function doimatkhau(){
        return view('user.doimatkhau');
    }
 
    
    public function ShowDoctor(Request $request)
    {


        $builder=DB::table('doctors');
        $datachuyenmon=BookingModel::getchuyenMon();

        $chuyen_mon=$request->chuyenMon !=null ? $request->chuyenMon:'';
        $DanhGia=$request->danhGia !=null ? $request->danhGia:'';
        $gioiTinh=$request->gioiTinh !=null ? $request->gioiTinh:'';

        $keyword=$request->keyword;

        if($keyword !=null){
            $builder->where('name_doctor','like','%'.$keyword.'%');  
        }

        if($keyword !=null && $chuyen_mon !=null){
            $builder->where('name_doctor','LIKE','%'.$keyword.'%')
            ->where('id_chuyenmon',$chuyen_mon);
        }
        if($keyword !=null && $chuyen_mon !=null){
            $builder->where('name_doctor','LIKE','%'.$keyword.'%')
            ->where('id_chuyenmon',$chuyen_mon);
        }

        if($keyword !=null && $DanhGia !=null){
            $builder->where('name_doctor','LIKE','%'.$keyword.'%')
            ->where('star',$DanhGia);
        }

        if($keyword !=null && $gioiTinh !=null){
            $builder->where('name_doctor','LIKE','%'.$keyword.'%')
            ->where('gender',$gioiTinh);
        }

        if($keyword !=null && $gioiTinh !=null && $chuyen_mon !=null && $DanhGia !=null){
            $builder->where('name_doctor','LIKE','%'.$keyword.'%')
            ->where('gender',$gioiTinh)
            ->where('id_chuyenmon',$chuyen_mon)
            ->where('star',$DanhGia);
        }
        if($keyword !=null && $gioiTinh !=null && $chuyen_mon !=null ){
            $builder->where('name_doctor','LIKE','%'.$keyword.'%')
            ->where('gender',$gioiTinh)
            ->where('id_chuyenmon',$chuyen_mon)
           ;
        }
        if($keyword !=null && $gioiTinh !=null  && $DanhGia !=null){
            $builder->where('name_doctor','LIKE','%'.$keyword.'%')
            ->where('gender',$gioiTinh)
            ->where('star',$DanhGia);
        }
        if($keyword !=null &&  $chuyen_mon !=null && $DanhGia !=null){
            $builder->where('name_doctor','LIKE','%'.$keyword.'%')
            ->where('id_chuyenmon',$chuyen_mon)
            ->where('star',$DanhGia);
        }

        
        if($chuyen_mon !=null){
            $builder->where('id_chuyenmon',$chuyen_mon);
        }

        if($DanhGia !=null){
            $builder->where('star',$DanhGia);
        }

        if($gioiTinh !=null){
            $builder->where('gender',$gioiTinh);
        }


        if($chuyen_mon !=null && $DanhGia !=null){
            $builder->where('id_chuyenmon',$chuyen_mon)->where('star',$DanhGia);
        }

        if($chuyen_mon !=null && $gioiTinh !=null){
            $builder->where('id_chuyenmon',$chuyen_mon)->where('gender',$gioiTinh);
        }


        if($DanhGia !=null && $gioiTinh !=null){
            $builder->where('star',$DanhGia)->where('gender',$gioiTinh);
        }

        if($chuyen_mon !=null && $DanhGia !=null && $gioiTinh !=null){
            $builder->where('id_chuyenmon',$chuyen_mon)->where('star',$DanhGia)->where('gender',$gioiTinh);
        }





    $thongke=$builder->paginate(6);


       
        return view('user.appointment.index',['doctors'=>$thongke,'datachuyenmon'=>$datachuyenmon,'chuyenmon'=>$request->chuyenMon 
                    ,'danhGia'=>$request->danhGia,'gioiTinh'=>$request->gioiTinh,'keyword'=>$request->keyword
        ]);

    }







    public function getVlues($id_doctor)
    {
        $rs= CustomerModel::getVlues($id_doctor)[0];
        
        return view('user.appointment.informationdoctor',['values'=>$rs]);
    }

    public function booKing()
    {
        if(Auth::guest()){
            return redirect(route('login'));
        }
        else{
            $data=BookingModel::getAllDoctor();
           return view('user.appointment.booking',['datadoctor'=>$data]);
        }
       
    }





    public function phanHoi(){
        if(Auth::guest()){
            return redirect(route('login'));
        }
        else{
            return view('user.appointment.phanhoi');
        }   
    }

    public function insertPhanhHoi(Request $request){

        $request->validate([
            'name'=>'required',
            'phone'=>'required|min:5|max:12',
            'purpose'=>'required',
       ],
       [
            'name.required'=>'Name is required',
            'phone.required'=>'Phone is required',
            'purpose.required'=>'Purpose is required',
       ]);
        
                $name=$request->input('name');
                $phone=$request->input('phone');
                $lydo=$request->input('purpose');
                $to=$request->input('to');
                $id_user=$request->input('id_user');
                $rs=CustomerModel::insertPhanhoi($id_user,$name,$phone,$lydo,$to);

                if($rs==false){
                    return "Thêm Phản Hồi Thất Bại";
                }else{
                    return redirect()->route('lichsuphanhoi', ['id' => $id_user]);
                }
               
            }


      public function lichsuphanhoi($id){
        $rs=CustomerModel::lichsuphanhoi($id);
        return view('user.appointment.lichsuphanhoi',['data'=>$rs]);
      }      
}
