<?php

namespace App\Http\Controllers;

use App\Models\feedbackModel;
use Illuminate\Http\Request;

class feedbackController extends Controller
{
    function getAllFeedback(){
        return view('admin.feedback.list',['doctor'=>feedbackModel::getAllFeedback()]);
    }

    function DoctorFeedback(){
        return view('doctor.feedback.list',['doctor'=>feedbackModel::DoctorFeedback()]);
    }

    //phản hồi bên doctor

    function getFeedback($id_phanhoi){
        $phanhoi = feedbackModel::getFeedback($id_phanhoi)[0];
        return view('doctor.feedback.edit',['phanhoi'=>$phanhoi]);
    }

    function updateFeedback(Request $request,$id_phanhoi){
        
        $id_phanhoi = $request->input('id_phanhoi');
        $name = $request->input('name');
        $phone = $request->input('phone');
        $lydoviettay = $request->input('lydoviettay');
        $phanhoiadmin= $request->input('phanhoiadmin');
        $to = $request->input('to');
        $created_at = $request->input('created_at');
      

        

       

        $rs = feedbackModel::updateFeedback($id_phanhoi,$name,$phone,$lydoviettay,$phanhoiadmin,$to,$created_at);

        if($rs == true){
            return redirect('assets/doctor/feedback/list');
        }
        else{
            return "Insert that bai";
        }
    }
    function getFeedback2($id_phanhoi){
        $phanhoi = feedbackModel::getFeedback($id_phanhoi)[0];
        return view('admin.feedback.edit',['phanhoi'=>$phanhoi]);
    }

    function updateFeedback2(Request $request,$id_phanhoi){
        
        $id_phanhoi = $request->input('id_phanhoi');
        $name = $request->input('name');
        $phone = $request->input('phone');
        $lydoviettay = $request->input('lydoviettay');
        $phanhoiadmin= $request->input('phanhoiadmin');
        $to = $request->input('toto');
        $created_at = $request->input('created_at');
      

        

       

        $rs = feedbackModel::updateFeedback2($id_phanhoi,$name,$phone,$lydoviettay,$phanhoiadmin,$to,$created_at);

        if($rs == true){
            return redirect('assets/feedback/list');
        }
        else{
            return "Insert that bai";
        }
    }

    //phản hồi bên admin

}