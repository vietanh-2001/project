<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BookingModel extends Model
{
    use HasFactory;

    static function getAllDoctor(){
        $rs=DB::select('select id_doctor,name_doctor from doctors ');
        return $rs;
    }   

    static function insertAppointment($id,$id_doctor,$date,$time_start,$time_end,$purpose){
        return DB::table('appointment')->insertGetId(['id_user'=>$id,'id_doctor'=>$id_doctor,'date'=>$date,'time_start'=>$time_start,'time_end'=>$time_end,'purpose'=>$purpose]);
    }

    static function getDataAppointment(){
        return DB::select('select id from appointment');
    }

    static function dataCheckOut($id){
        return DB::table('appointment')
            ->join('doctors', 'appointment.id_doctor', '=', 'doctors.id_doctor')
            ->join('users', 'appointment.id_user', '=', 'users.id')
            ->select('users.*', 'appointment.*', 'doctors.name_doctor')
            ->where('appointment.id',$id)
            ->get();
    }


    static function lichsuBooking($id){
        return DB::table('appointment')
            ->join('doctors', 'appointment.id_doctor', '=', 'doctors.id_doctor')
            ->join('users', 'appointment.id_user', '=', 'users.id')
            ->select('users.id','users.name', 'appointment.date','appointment.id','appointment.time_start','appointment.status','appointment.id_user','appointment.time_end', 'doctors.name_doctor','doctors.id_doctor')
            ->where('users.id',$id)
            ->paginate(10);
    }

    static function getchuyenMon(){
        return DB::select('select * from chuyenmon');
    }

    static function cancelBooking($id){
        return DB::table('appointment')
        ->where('id', $id)
        ->update(['status' => 'canceled']);
    }

    static function getiduser($id){
        return DB::table('appointment')
        ->select('appointment.id_user')
        ->where('appointment.id',$id)
        ->get();
    }

   
}
