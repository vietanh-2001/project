@extends('layouts/user')

@section('namepage','Kiểm Tra Cuộc Hẹn')
@section('title','Kiểm Tra Cuộc Hẹn')


@section('content')
<br>
    <div   class="checkout"   >
        <h2 style="font-size:30px;color:red;margin-top:20px;  ">Cuộc hẹn</h2>
    @forelse ($databooking as $item)

        <h1>Mã Cuộc Hẹn :{{$item->id}} </span></h1>
        <h1>Tên Người Đặt:{{$item->name}}</h1>
        <h1>Địa chỉ người đặt:{{$item->address}}</h1>
        <h1>Số Điện Thoại Người Đặt:{{$item->phone}}</h1>
        <h1>Bác sĩ :{{$item->name_doctor}}</h1>
        <h1>Ngày:{{$item->date}}</h1>
        <h1>Cuộc hẹn bắt đầu từ:{{$item->time_start}} đến {{$item->time_end}}</h1>
        <h1>Lý do cuộc hẹn :{{$item->purpose}}</h1>

        <h1>Qúy khách lưu ý hãy đến đúng giờ để được nhận được sự tư vấn và chăm sóc của bác sĩ</h1>
        <br>
        <a href="{{ url('/') }}" style="text-decoration: none">
            <button >
                Quay Lại Trang Chủ
            </button>
         </a> 
         <a href="{{url('/user.appointment.lichsubooking/'.Auth::user()->id)}}" style="text-decoration: none" >
            <button  >
                Xem lịch sử cuộc hẹn
            </button>     
        </a>   
    
        
    @empty
        
    @endforelse


</div>

      
          
@endsection