<?php

namespace App\Http\Controllers;

use App\Models\MyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class MyController extends Controller
{
    function getAll(){
        return view('admin.user.list',['doctor'=>MyModel::getAll()]);
    }

    function insertProcess(Request $request){

        $request->validate([
            'name_doctor' => 'required',
            'doctor_email' => 'required|email',
            'doctor_date' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'star'=>'required',           
            'doctor_degree' => 'required',
            'doctor_export' => 'required',
            'id_chuyenmon' => 'required'
         ]);

        $id_doctor = $request->input('id_doctor');
        $name_doctor = $request->input('name_doctor');
        $doctor_email = $request->input('doctor_email');
    
        $doctor_date = date('Y-m-d' ,strtotime($request ->input('doctor_date')));

        $fileName = time().".".$request->file('image')->extension();
    
        $request->file('image')->storeAs('public',$fileName);

        $path = 'storage/'.$fileName;

        $gender = $request ->input('gender');
        $address = $request->input('address');
        $phone = $request ->input('phone');
        $star = $request->input('star');
        $doctor_degree = $request->input('doctor_degree');
        $doctor_export = $request->input('doctor_export');
        $id_chuyenmon = $request ->input('id_chuyenmon');
        

       
        $rs = MyModel::insertProcess($name_doctor,$doctor_email,$doctor_date,$path,$gender,$address,$phone,$star,$doctor_degree,$doctor_export,$id_chuyenmon);

        if($rs == true){
            return redirect('assets/user/list');
        }
        else{
            return "Insert that bai";
        }
    }

    function deleteDoctor($id_doctor){
        $rs = MyModel::deleteDoctor($id_doctor);

        if($rs != 0){
            return redirect('assets/user/list');
        }
        else{
            return "Không có bác sĩ có id=$id_doctor";
        }
    }

    function getChuyenmon(){
        return view('admin/user/create',['chuyenmon'=>MyModel::getChuyenmon()]);
        
    }

    

    function getAll1(){
        return view('admin.chuyenmon.list',['chuyenmon1'=>MyModel::getAll1()]);
    }

    function insertProcess1(Request $request){
        $request->validate([
            'id_chuyenmon'=>'required',
            'name'=>'required', 
        ],
        [
            'id_chuyenmon.required'=>'Trường id chuyên môn không thể để trống',
            'name'=>'Tên chuyên môn không thể để trống'
        ],
    
    );

        $id_chuyenmon = $request->input('id_chuyenmon');
        $name = $request->input('name');

        $rs = MyModel::insertProcess1($id_chuyenmon,$name);
        if($rs == true){
            return redirect('assets/chuyenmon/list');
        }
        else{
            return "Insert that bai";
        }
    }

    function getDoctor($id_doctor){
        $doctor = MyModel::getDoctor($id_doctor)[0];
        return view('admin.user.edit',['doctor'=>$doctor,'chuyenmon2'=>MyModel::getchuyenmon11()]);
    }

    function updateDoctor(Request $request,$id_doctor){
        


        $name_doctor = $request->input('name_doctor');
        $doctor_email = $request->input('doctor_email');      
        $doctor_date = $request ->input('doctor_date');
        $gender = $request ->input('gender');
        $address = $request->input('address');
        $phone = $request ->input('phone');
        $star = $request->input('star');
        $doctor_degree = $request->input('doctor_degree');
        $doctor_export = $request->input('doctor_export');
        $id_chuyenmon = $request ->input('id_chuyenmon');

        
        
        // $image_name = $request->hidden_image;
        // $image = $request->file('image');
        //  if($image != '')
        //  {
        //      $image_name = rand().'.'.$image->getClientOriginalExtension();
        //      $image->move(public_path('images'));
        //  }
        $file = $request->file('image');    
        $path = "";
        if($file != null) {
            $fileName = time().".".$request->file('image')->extension();

            $request->file('image')->storeAs('public',$fileName);

            $path = 'storage/'.$fileName;
        }else{
            $path = 'x';
        }
 
       

        $rs = MyModel::updateDoctor($id_doctor,$name_doctor,$doctor_email,$doctor_date,$path,$gender,$address,$phone,$star,$doctor_degree,$doctor_export,$id_chuyenmon);
        //dd($rs);
        if($rs == true){
            return redirect('assets/user/list');
        }
        else{
            return "Insert that bai";
        }
    }

    function getChuyenmon112($id_chuyenmon){
        $chuyenmon = MyModel::getChuyenmon112($id_chuyenmon)[0];
        return view('admin.chuyenmon.edit',['chuyenmon'=>$chuyenmon]);
    }

    function updateChuyenmon1(Request $request,$id_chuyenmon){
        
        $id_chuyenmon = $request->input('id_chuyenmon');
        $name = $request->input('name');
       

        $rs = MyModel::updateChuyenmon1($id_chuyenmon,$name);

        if($rs == true){
            return redirect('assets/chuyenmon/list');
        }
        else{
            return redirect('assets/chuyenmon/list')->with('error','Câp Nhật Không Thành Công');
        }
    }
    
    
    
}