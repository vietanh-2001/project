<?php

namespace App\Http\Controllers;

use App\Models\thongkeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class thongkeController extends Controller
{
    function thongke(){
        $rs=thongkeModel::thongke();
        $rs1=thongkeModel::thongke1();
        $rs2=thongkeModel::thongke2();
        // dd($rs);
        $users = thongkeModel::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('date', date('Y'))
                    ->groupBy(DB::raw("Month(date)"))
                    ->pluck('count');

        $months = thongkeModel::select(DB::raw("Month(date) as month"))
                    ->whereYear('date', date('Y'))
                    ->groupBy(DB::raw("Month(date)"))
                    ->pluck('month');            
        
        $datas= array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($months as $index => $month){
            // $datas[$month] = $users[$index];
            $datas[$month - 1]=$users[$index];
        }
        return view('admin.thongke.list',["dem1"=>$rs,"dem2"=>$rs1,"dem3"=>$rs2],compact('datas'));
    }

    // function index()
    // {
    //     $users = thongkeModel::select(DB::raw("COUNT(*) as count"))
    //                 ->whereYear('created_at', date('Y'))
    //                 ->groupBy(DB::raw("Month(created_at)"))
    //                 ->pluck('count');

    //     $months = thongkeModel::select(DB::raw("Month(created_at) as month"))
    //                 ->whereYear('created_at', date('Y'))
    //                 ->groupBy(DB::raw("Month(created_at)"))
    //                 ->pluck('month');            
        
    //     $datas= array(0,0,0,0,0,0,0,0,0,0,0,0);
    //     foreach($months as $index => $month){
    //         $datas[$month] = $users[$index];
    //     }
    //     return view('admin.thongke.list', compact('datas'));
    // }

    function thongketheodoctor($id){
        $rs=thongkeModel::thongketheoMonth($id);
        $rs1=thongkeModel::thongketheoDay($id);
        $rs2=thongkeModel::thongketheoYear($id);

        $datadoctor=DB::select("select * from doctors where  id_doctor ='$id'")[0];
        // dd($datadoctor);
        $users = thongkeModel::select(DB::raw("COUNT(*) as count "))
                    ->where('id_doctor',$id)
                    ->whereYear('date', date('Y'))
                    ->groupBy(DB::raw("Month(date)"))
                    ->pluck('count');

        $months = thongkeModel::select(DB::raw("Month(date) as month "))
                    ->where('id_doctor',$id)
                    ->whereYear('date', date('Y'))
                    ->groupBy(DB::raw("Month(date)"))
                    ->pluck('month');            
        
        $datas= array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($months as $index => $month){
            // $datas[$month] = $users[$index];
            $datas[$month - 1]=$users[$index];
        }
        return view('admin.thongke.listappointmentdoctor',["dem1"=>$rs,"dem2"=>$rs1,"dem3"=>$rs2,"datadoctor"=>$datadoctor],compact('datas'));
    }
}