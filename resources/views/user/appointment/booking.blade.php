@extends('layouts/user')
@section('namepage','Đặt lịch hẹn')
@section('title','Đặt Lịch Hẹn')




@section('content')
<section class="contact-us">
  <h1 style="font-size:33px;text-align: center;margin-top:30px;  ">Đặt lịch hẹn</h1>
  <div class="row">
      <div class="contact-col"  >
          <div>
            <h1 style="font-size:30px;margin-left:30px;  ">Chào Mừng bạn đến với chúng tôi</h1>
          </div>
          <div>
            <img src="{{ url('../images/2.png') }}" alt="" style="border-radius: 70px;">
          </div>
      </div>
      
      

      <div class="contact-col" id="booking" style="border:3px solid black;border-radius:30px; box-shadow: 5px 7px 8px 7px #888888;  " >
          
        <form method="POST" style="padding: 35px;" >
          @csrf
            
            <label for="name"><h1 style="color: white">Phone</h1></label>
            <input type="text" value="{{Auth::user()->name}}" id="name" style="font-size:15px; " >
            
            
             <label for="phone"><h1 style="color: white">Phone</h1></label>
            <input type="text" value="{{Auth::user()->phone}}" id="phone" style="font-size:15px; ">
           
 
            
             <label for="address"><h1 style="color: white">Address</h1></label>
             <input type="text" value="{{Auth::user()->address}}" id="address" style="font-size:15px; ">
            
 
            
             <label for="doctor"><h1 style="color: white">Doctor</h1></label>
             <br>
            <select name="id_doctor" id="doctor" style="width:300px ;">
                    @foreach ($datadoctor as $doctor)
                            <option value="{{$doctor->id_doctor}}" style="font-size:15px; ">{{$doctor->name_doctor}}</option>
        
                    @endforeach
 
             </select>
           
             <br>
             <br>
             <label for="doctor"><h1 style="color: white">Date:</h1></label>
                <input type="date"  name="date" style="font-size:15px;"          
                @if (session()->has('success'))
                    value="{{ session('success') }}"
                @endif >
            
 
             <label for="doctor"><h1 style="color: white">Thời Gian Bắt Đầu và kết thúc</h1></label>
             @if($errors->any())
                   <h3 style="font-size:12px;color:red " >{{$errors->first()}}</h3>
              @endif
            <input type="text"  id="reservationtime" name="time" style="font-size:15px; " 
            @if (session()->has('success1'))
                 value="{{ session('success1') }}"
            @endif
            />
                     
                   
            
                
                  <label for=""><h1 style="color: white">Vấn đề của bạn:</h1></label>
                  <textarea class="form-control" name="purpose" id="" rows="3"></textarea>
                
                
                  <input type="hidden" value="{{Auth::user()->id}}"  name="id_user">
                
      
             <button type="submit" class="btn " style="background: red;color:black;width: 300px;font-size:30px;margin-left: 100px; " >Booking</button>
         </form>
      </div>
  </div>
</section>
         
           
         
        
     
@endsection



