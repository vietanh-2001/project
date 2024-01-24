<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MyModel extends Model
{
    use HasFactory;


    static function getAll(){
        return DB::select("SELECT * FROM doctors");
    }

    static function getAll1(){
        return DB::select("SELECT * FROM chuyenmon");
    }

    static function insertProcess($name_doctor,$doctor_email,$doctor_date,$path,$gender,$address,$phone,$star,$doctor_degree,$doctor_export,$id_chuyenmon){
        return DB::insert("INSERT INTO `doctors`(`name_doctor`, `doctor_email`,`doctor_date`, `image`, `gender`, `address`, `phone`, `star`, `doctor_degree`,`doctor_export`, `id_chuyenmon`) VALUES ('$name_doctor','$doctor_email','$doctor_date','$path','$gender','$address','$phone','$star','$doctor_export','$doctor_degree','$id_chuyenmon')");
    }

    static function deleteDoctor($id_doctor){
        $rs = DB::delete("DELETE FROM doctors WHERE id_doctor='$id_doctor'");
        return $rs;
    }

    static function getChuyenmon(){
        return DB::select("SELECT * FROM chuyenmon");
    }


    static function getchuyenmon11(){
        // dd(DB::select("SELECT * FROM chuyenmon"));
        return DB::select("SELECT * FROM chuyenmon");
    }

    static function insertProcess1($id_chuyenmon,$name){
        return DB::insert("INSERT INTO chuyenmon VALUE('$id_chuyenmon','$name')");
    }

    static function getDoctor($id_doctor){
        $doctors = DB::select("SELECT * FROM doctors WHERE id_doctor='$id_doctor'");
        return $doctors;
    }

    static function updateDoctor($id_doctor,$name_doctor,$doctor_email,$doctor_date,$path,$gender,$address,$phone,$star,$doctor_degree,$doctor_export,$id_chuyenmon){
        $doctor = DB::table('doctors')->where('id_doctor',$id_doctor)->first();
        //dd($path);
        $pathStore="";
        if($path=='x' ) {
            $pathStore = $doctor->image;
        }else{
            $pathStore = $path;
        }
        $data = [
            'name_doctor'=>$name_doctor,
            'doctor_email'=>$doctor_email,
            'doctor_date'=>$doctor_date,
            'image'=>$pathStore,
            'gender'=>$gender,
            'address'=>$address,
            'address'=>$address,
            'phone'=>$phone,
            'star'=>$star,
            'doctor_degree'=>$doctor_degree,
            'doctor_export'=>$doctor_export,
            'id_chuyenmon'=>$id_chuyenmon,
        ];
        // dd($data);
        return DB::table('doctors')->where('id_doctor',$id_doctor)->update($data);
        //dd($pathStore);
        // return DB::update("UPDATE doctor SET name_doctor`='$name_doctor',doctor_email`='$doctor_email',`doctor_date`='$doctor_date',`image`='$pathStore',`gender`='$gender',`address`='$address',`phone`='$phone',`star`='$star',`doctor_degree`='$doctor_degree',`doctor_export`='$doctor_export',`id_chuyenmon`='$id_chuyenmon' WHERE id_doctor='$id_doctor'");
    }

    static function getChuyenmon112($id_chuyenmon){
        $chuyenmon = DB::select("SELECT * FROM chuyenmon WHERE id_chuyenmon='$id_chuyenmon'");
        return $chuyenmon;
    }

    static function updateChuyenmon1($id_chuyenmon,$name){
        return DB::update("UPDATE chuyenmon SET name='$name' WHERE id_chuyenmon='$id_chuyenmon'");
    }

    
}