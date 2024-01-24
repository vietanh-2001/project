<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class feedbackModel extends Model
{
    use HasFactory;
    protected $table = 'phanhoi';
    static function getAllFeedback(){
        return DB::select("SELECT * FROM phanhoi");
        // return feedbackModel::join('users','phanhoi.id_user','users.id')                           
        //                     ->select('phanhoi.*','users.name')
        //                     ->get();
        // SELECT * FROM `appointment` INNER JOIN doctor ON appointment.id_doctor=doctor.id_doctor INNER JOIN users ON appointment.id_user=users.id_users
    }

    static function DoctorFeedback(){
        return DB::select("SELECT * FROM phanhoi where toto='chuyenmon'");
        // return feedbackModel::join('users','phanhoi.id_user','users.id')                           
        //                     ->select('phanhoi.*','users.name')
        //                     //->where('phanhoi.to'='admin')
        //                     ->get();
        // SELECT * FROM `appointment` INNER JOIN doctor ON appointment.id_doctor=doctor.id_doctor INNER JOIN users ON appointment.id_user=users.id_users
    }
    //phản hồi bên doctor

    static function getFeedback($id_phanhoi){
        $doctors = DB::select("SELECT * FROM phanhoi WHERE id_phanhoi='$id_phanhoi'");
        return $doctors;
    }

    static function updateFeedback($id_phanhoi,$name,$phone,$lydoviettay,$phanhoiadmin,$to,$created_at){
        return DB::update("UPDATE `phanhoi` SET `phanhoiadmin`='$phanhoiadmin' WHERE id_phanhoi='$id_phanhoi'");
    }


    static function getFeedback2($id_phanhoi){
        $doctors = DB::select("SELECT * FROM phanhoi WHERE id_phanhoi='$id_phanhoi'");
        return $doctors;
    }

    static function updateFeedback2($id_phanhoi,$name,$phone,$lydoviettay,$phanhoiadmin,$to,$created_at){
        return DB::update("UPDATE phanhoi SET `phanhoiadmin`='$phanhoiadmin' WHERE id_phanhoi='$id_phanhoi'");
}
    //phản hồi bên admin
}