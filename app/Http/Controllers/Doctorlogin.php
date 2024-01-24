<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Doctorlogin extends Controller
{
    //
        //
        function login(){
            if(session()->has('LoggedUser')){
                return redirect('assets/list/list');
            }
            else{
            return view('auth.logindoctor');
            }
        }
        function register(){
            return view('auth.register');
        }
        function save(Request $request){
            
            //Validate requests
            $request->validate([
                'name'=>'required',
                'email'=>'required|email|unique:admins',
                'password'=>'required|min:5|max:12'
            ]);
    
             //Insert data into database
             $admin = new Doctor;
             $admin->name = $request->name;
             $admin->email = $request->email;
             $admin->password = Hash::make($request->password);
             $save = $admin->save();
    
             if($save){
                return back()->with('success','New User has been successfuly added to database');
             }else{
                 return back()->with('fail','Something went wrong, try again later');
             }
        }
    
        function check(Request $request){
            //Validate requests
            $request->validate([
                 'email'=>'required|email',
                 'password'=>'required|min:5|max:12',
                
            ]);
    
            $userInfo = Doctor::where('doctor_email','=', $request->email)->first();
    
            if(!$userInfo){
                return back()->with('fail','We do not recognize your email address');
            }else{
                //check password
                if(Hash::check($request->password, $userInfo->password)){
                    $request->session()->put('LoggedUser', $userInfo->id_doctor);

                    return redirect('assets/list/list');
    
                }else{
                    return back()->with('fail','Incorrect password');
                }
            }
        }


        function logout(){
            if(session()->has('LoggedUser')){
                session()->pull('LoggedUser');
                return redirect('/doctorlogin');
            }
        }
     
        
       
    }
    

