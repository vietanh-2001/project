@extends('layouts/user')
@section('namepage','Thông Tin Chi Tiết Bác Sĩ')
    
@section('title','Thông Tin Chi Tiết Bác Sĩ')



@section('content')

<section class="contact-us">
   
    <div class="row">
        <div class="contact-col1">
            <h2 style="margin-top:10px;font-size:30px;color: red;text-align: center  ">Thông Tin Chi Tiết Bác sĩ</h2>
            <h1  style="margin-top:30px; ">Tên Bác Sĩ:{{$values->name_doctor}}</h1>
            <h1>Chuyên Ngành:{{$values->name}}</h1> 
            <h1>
                Đánh Giá:
                @for ($i = 0; $i < $values->star; $i++)
                    <i class="fa fa-star" aria-hidden="true"></i>
                @endfor
            </h1>
            <h1>Số Điện Thoại:<i class="fa fa-phone" aria-hidden="true"></i> {{$values->phone}}</h1>
            <h1>Địa Chỉ:{{$values->address}}</h1>
            <h1>Email:{{$values->doctor_email}}</h1>
            <h1>Ngày Sinh:{{Carbon\Carbon::createFromFormat('Y-m-d',$values->doctor_date)->format('d-m-Y')}}</h1>
            <h1>
                Giới Tính:
                @if ($values->gender==1)
                    Nam
                @elseif($values->gender==2)    
                    Nữ
                @endif

            </h1>
           
            <h1>Bằng Cấp:{{$values->doctor_degree}}</h1>
            <h1 >Học Tập  Từ:{{$values->doctor_export}}</h1>  

            <a href="{{ url('user/appointment/booking') }}"><button type="submit" class="btn"  style="margin-bottom:50px;margin-top:30px;margin-left:150px;width:200px;font-size:20px;     ">Booking</button></a>
    

                        
            
            
        </div>
        <div class="contact-col2">
            <h1 style="font-size:25px;color:black;margin-top:20px;text-align: center;  ">Ảnh Đại Diện</h1>
            

            <img src="{{asset($values->image) }}" alt="" >
        </div>
    </div>
</section>
       
@endsection