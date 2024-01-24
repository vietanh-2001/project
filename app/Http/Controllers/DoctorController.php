<?php

namespace App\Http\Controllers;

use App\Models\DoctorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    function getAllDoctor(){
       
        $id_doctor=session('LoggedUser');
        $rs=DoctorModel::getAllDoctor($id_doctor);
        return view('doctor.list.list',['doctor'=>$rs]);
    }
    
    function Completed($id){

        $rs = DoctorModel::Completed($id);
        
        if($rs==false){
            return "Complete thất bại";
        }else{
            $id_doctor=session('LoggedUser');
            return view('doctor/list/list',['doctor'=>DoctorModel::getAllDoctor($id_doctor)]);      
        }
    }

    function getAllAppointment(){

    //  dd(DoctorModel::getAllAppointment());
        return view('admin.cuochen.list',['doctor'=>DoctorModel::getAllAppointment()]);
    }

    function Approved($id){

        $rs = DoctorModel::Approved($id);
        
        if($rs==false){
            return "Approve thất bại";
        }else{
            return view('admin/cuochen/list',['doctor'=>DoctorModel::getAllAppointment()]);      
        }
    }

    function lichhen(){
        $id_doctor=session('LoggedUser');
        $tasks=DoctorModel::lichhen($id_doctor);
        
        return view('doctor/calender/index',compact('tasks'));
    }
}

