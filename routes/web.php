<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;


// admin,doctor
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\Doctorlogin;
use App\Http\Controllers\feedbackController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\thongkeController;
use App\Models\DoctorModel;
use Illuminate\Support\Facades\Route;
use PhpParser\Comment\Doc;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Trang home


    Route::get('/',[HomeController::class,'index']);

    Route::get('/home',[HomeController::class,'redirect']);

// endHome

    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
            return view('dashboard');
    })->name('dashboard');

    // Xóa cuộc hẹn
    

    
    Route::get('user.appointment.index',[HomeController::class,'ShowDoctor']);

    Route::get('user/appointment/informationdoctor/{id_doctor}',[HomeController::class,'getVlues']);

    Route::get('user/appointment/booking',[HomeController::class,'booKing']);

    Route::post('user/appointment/booking',[BookingController::class,'insertAppointment']);

   
    // Route::get('checkout/{id}', function ($id) {
    //     return view('user.appointment.checkout',compact('id'));
    // })->name('checkout');

    // Route::get('checkout/{id}',[BookingController::class,'checkOut'])->name('checkout')->middleware('auth.userss');

    // Route::get('/user.appointment.lichsubooking/{id}',[BookingController::class,'lichsuBooking'])->name('lichsubooking')->middleware('auth.userss');





    Route::get('/phanhoi',[HomeController::class,'phanHoi']);
    // admin,doctor
    Route::middleware(['auth.userss'])->group(function () {
                Route::get('/user.appointment.lichsubooking/{id}',[BookingController::class,'lichsuBooking'])->name('lichsubooking');
                Route::get('/user.lichsudangnhap', function () {
                    return view('user.lichsudangnhap');
                });
                Route::get('user/appointment/checkappointment/{id}',[BookingController::class,'checkapppointment']);
                Route::get('user/appointment/checkphanhoi/{id}',[BookingController::class,'checkphanhoi']);


                Route::get('/user.baomathailop', function () {
                    return view('user.baomathailop');
                });
                Route::get('/user.baomathailop', function () {
                    return view('user.baomathailop');
                });

                Route::get('/user.delete', function () {
                    return view('user.delete');
                });

                Route::get('/user.profile', function () {
                    return view('user.profile');
                });

                Route::get('user.doimatkhau', function () {
                    return view('user.doimatkhau');
                });

                Route::get('checkout/{id}',[BookingController::class,'checkOut'])->name('checkout');

                Route::get('/user.appointment.lichsuphanhoi/{id}',[HomeController::class,'lichsuphanhoi'])->name('lichsuphanhoi');
                Route::post('/phanhoi',[HomeController::class,'insertPhanhHoi']);
                Route::get('/deleteAppointment/{id_user}/{id}',[BookingController::class,'cancelBooking']);




                Route::get('assets/user/create', function (){
                    return view('admin.user.create');
                });
                
                Route::get('assets/user/list', function (){
                    return view('admin.user.list');
                });
                
                Route::get('assets/list/list', function (){
                    return view('doctor.list.list');
                });
                
                Route::get('assets/chuyenmon/create', function (){
                    return view('admin.chuyenmon.create');
                });
                
                Route::get('assets/chuyenmon/list', function (){
                    return view('admin.chuyenmon.list');
                });
                
                Route::get('assets/user/edit', function (){
                    return view('admin.user.edit');
                });
            
                
                // chuyên môn
                
                Route::get('assets/chuyenmon/list',[MyController::class,'getAll1']);
                
                Route::POST('assets/chuyenmon/create',[MyController::class,'insertProcess1']);
                
                // Route::get('/edit/{id_chuyenmon}',[MyController::class,'updateChuyenmon1']);
                
                // admin
                
                Route::get('assets/user/list',[MyController::class,'getAll'])->name('assets/user/list');
                
                Route::POST('assets/user/create',[MyController::class,'insertProcess']);
                
                Route::get('/edit/{id_doctor}',[MyController::class,'getDoctor']);
                
                Route::post('/edit/{id_doctor}',[MyController::class,'updateDoctor']);
                
                Route::get('/delete/{id_doctor}',[MyController::class,'deleteDoctor']);
                
                Route::get('assets/user/create',[MyController::class,'getChuyenmon']);
                
                Route::get('assets/user/edit',[MyController::class,'getchuyenmon11']);

                Route::get('/editChuyenmon/{id_chuyenmon}',[MyController::class,'getChuyenmon112']);

                Route::post('/editChuyenmon/{id_chuyenmon}',[MyController::class,'updateChuyenmon1']);
                
                // cuộc hẹn
                
                Route::get('assets/cuochen/list',[DoctorController::class,'getAllAppointment']);
                
                Route::get('/approve/{id}',[DoctorController::class,'Approved']);

                Route::get('assets/feedback/list',[feedbackController::class,'getAllFeedback']);

                Route::get('assets/thongke/list',[thongkeController::class,'thongke']);

                
                Route::get('/edit2/{id_phanhoi}',[feedbackController::class,'getFeedback2']);
            
                Route::post('/edit2/{id_phanhoi}',[feedbackController::class,'updateFeedback2']);

                Route::get('thongke/listappointmentdoctor/{id}',[thongkeController::class,'thongketheodoctor']);
                
    });





    // Route::get('assets/user/create', function (){
    //     return view('admin.user.create');
    // });
    
    // Route::get('assets/user/list', function (){
    //     return view('admin.user.list');
    // });
    
    // Route::get('assets/list/list', function (){
    //     return view('doctor.list.list');
    // });
    
    // Route::get('assets/chuyenmon/create', function (){
    //     return view('admin.chuyenmon.create');
    // });
    
    // Route::get('assets/chuyenmon/list', function (){
    //     return view('admin.chuyenmon.list');
    // });
    
    // Route::get('assets/user/edit', function (){
    //     return view('admin.user.edit');
    // });

    
    // // chuyên môn
    
    // Route::get('assets/chuyenmon/list',[MyController::class,'getAll1']);
    
    // Route::POST('assets/chuyenmon/create',[MyController::class,'insertProcess1']);
    
    // // Route::get('/edit/{id_chuyenmon}',[MyController::class,'updateChuyenmon1']);
    
    // // admin
    
    // Route::get('assets/user/list',[MyController::class,'getAll'])->name('assets/user/list');
    
    // Route::POST('assets/user/create',[MyController::class,'insertProcess']);
    
    // Route::get('/edit/{id_doctor}',[MyController::class,'getDoctor']);
    
    // Route::post('/edit/{id_doctor}',[MyController::class,'updateDoctor']);
    
    // Route::get('/delete/{id_doctor}',[MyController::class,'deleteDoctor']);
    
    // Route::get('assets/user/create',[MyController::class,'getChuyenmon']);
    
    // Route::get('assets/user/edit',[MyController::class,'getchuyenmon11']);
    
    // // cuộc hẹn
    
    // Route::get('assets/cuochen/list',[DoctorController::class,'getAllAppointment']);
    
    // Route::get('/approve/{id}',[DoctorController::class,'Approved']);
    
    // doctor
    

    Route::middleware(['auth.doctor'])->group(function () {
        Route::get('assets/list/list',[DoctorController::class,'getAllDoctor']);
    
        Route::get('/complete/{id}',[DoctorController::class,'Completed']);
        
        Route::get('assets/calender/index',[DoctorController::class,'lichhen']);
        
        // Phản hồi
        
        
        
        
        Route::get('assets/doctor/feedback/list',[feedbackController::class,'DoctorFeedback']);
            //doctor
        Route::get('/edit1/{id_phanhoi}',[feedbackController::class,'getFeedback']);
        
        Route::post('/edit1/{id_phanhoi}',[feedbackController::class,'updateFeedback']);
    

    });
    
        //admin
    // Route::get('/edit2/{id_phanhoi}',[feedbackController::class,'getFeedback2']);
    
    // Route::post('/edit2/{id_phanhoi}',[feedbackController::class,'updateFeedback2

    Route::get('/doctorlogin',[Doctorlogin::class,'login'])->name('auth.login');
    Route::post('/doctorlogin',[Doctorlogin::class, 'check'])->name('auth.check');
    Route::get('/auth/logout',[Doctorlogin::class, 'logout'])->name('auth.logout');


    // Route::get('doctor.list.list',[Doctorlogin::class,'list']);
   




   