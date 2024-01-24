<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class thongkeModel extends Model
{
    use HasFactory;

   static function thongke(){
        return DB::select("SELECT count(*) as dem FROM appointment WHERE MONTH(date)=MONTH(NOW()) AND YEAR(date)=YEAR(NOW()) ");
   }

   static function thongke1(){
    return DB::select("SELECT count(*) as dem FROM appointment WHERE DAY(date)=DAY(NOW())");
   }

   static function thongke2(){
    return DB::select("SELECT count(*) as dem FROM appointment WHERE YEAR(date)=YEAR(NOW())");
   }

   public $table = "appointment";
    static function index(){
        return DB::select("SELECT * FROM appointment");
    }

    static function thongketheoDay($id){
        return DB::select("SELECT count(*) as dem FROM appointment WHERE DAY(date)=DAY(NOW()) AND YEAR(date)=YEAR(NOW()) AND id_doctor='$id'");
    }

    static function thongketheoMonth($id){
        return DB::select("SELECT count(*) as dem FROM appointment WHERE MONTH(date)=MONTH(NOW()) AND YEAR(date)=YEAR(NOW()) AND id_doctor='$id'");
    }

    static function thongketheoYear($id){
        return DB::select("SELECT count(*) as dem FROM appointment WHERE YEAR(date)=YEAR(NOW())  AND id_doctor='$id'");
    }
}