<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerModel extends Model
{
    use HasFactory;

    static function index($keyword){
        if($keyword=="")
            return DB::table('doctors')->paginate(6);
        else{
            return DB::table('doctors')->where('name_doctor','LIKE','%'.$keyword.'%')
            ->orWhere('phone','LIKE','%'.$keyword.'%')
            ->orWhere('doctor_email','LIKE','%'.$keyword.'%')
            ->paginate(6);
            }
        }

        static function getVlues($id_doctor){
            return DB::table('doctors')
                ->join('chuyenmon','doctors.id_chuyenmon','=','chuyenmon.id_chuyenmon')
                ->where('id_doctor','=',$id_doctor)
                ->select('doctors.*','chuyenmon.*')
                ->get();
        }  
        
      

        static function insertPhanhoi($id_user,$name,$phone,$lydo,$to){
            return DB::table('phanhoi')->insert(['id_user'=>$id_user,'name'=>$name,'phone'=>$phone,'lydoviettay'=>$lydo,'toto'=>$to]);
        }

        static function lichsuphanhoi($id){
                    return DB::table('phanhoi')
                    ->select('phanhoi.*')
                    ->where('id_user',$id)
                    ->paginate(6);
        }

}
