<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DoctorModel extends Model
{
    
    use HasFactory;
    protected $table = 'appointment';
    static function getAllDoctor($id_doctor){
        // return DB::select("SELECT * FROM appointment");
        return DB::table('appointment')
                    ->join('doctors', 'appointment.id_doctor', '=', 'doctors.id_doctor')
                    ->join('users', 'appointment.id_user', '=', 'users.id')
                    ->select('users.*', 'appointment.*', 'doctors.name_doctor')
                    ->where('appointment.id_doctor',$id_doctor)
                    ->get();
        // SELECT * FROM `appointment` INNER JOIN doctor ON appointment.id_doctor=doctor.id_doctor INNER JOIN users ON appointment.id_user=users.id_users
    }

    static function Completed($id){
            return DB::table('appointment')
            ->where('id', $id)
            ->update(['status' => 'completed']);
    }

    static function getAllAppointment(){
        // return DB::select("SELECT * FROM appointment");
        // return DoctorModel::join('doctors','appointment.id_doctor','doctors.id_doctor')
        //                     ->join('users','appointment.id_user','users.id')
        //                     ->select('appointment.*','doctors.name_doctor','users.name')
        //                      ->orderBy('appointment.id', 'asc')
        //                     ->get();

         return DB::table('appointment')
                        ->join('doctors', 'appointment.id_doctor', '=', 'doctors.id_doctor')
                        ->join('users', 'appointment.id_user', '=', 'users.id')
                        ->select('users.*', 'appointment.*', 'doctors.name_doctor')
                        ->orderBy('appointment.id', 'desc')
                        ->get();              
        // SELECT * FROM `appointment` INNER JOIN doctor ON appointment.id_doctor=doctor.id_doctor INNER JOIN users ON appointment.id_user=users.id_users
    }

    static function Approved($id){
        return DB::table('appointment')
        ->where('id', $id)
        ->update(['status' => 'approved']);
}

    static function lichhen($id_doctor){
        return DB::table('appointment')
        ->join('users','appointment.id_user','users.id')
        ->select('appointment.*','users.name')
        ->where('appointment.id_doctor',$id_doctor)
        ->get();
    }
}