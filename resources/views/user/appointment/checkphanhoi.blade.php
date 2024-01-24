@extends('layouts/user')

@section('namepage','Kiểm Tra Phản Hồi ')
@section('title','Kiểm Tra Phản Hồi')


@section('content')
<br>
    <div   class="checkout"  style=" height: 60vh;"  >
        <h2 style="font-size:30px;color:red;margin-top:20px;  ">Phản Hồi</h2>
    @forelse ($dataphanhoi as $item)

        <h1>Mã Phản Hồi :{{$item->id_phanhoi}} </span></h1>
        <h1>Tên Người Phản Hồi:{{$item->name}}</h1>
        <h1>Số Điện Thoại Người Phản Hồi:{{$item->phone}}</h1>
        <h1>Lý do phản hồi :{{$item->lydoviettay}}</h1>
        <h1>Phản Hồi Về : 
            @if ($item->toto ="chuyenmon")
                Chuyên Môn
            @else
                Thái Độ Phục vụ, Quản Trị    
            @endif
        </h1>
        <h1>Thời Gian Phản Hồi: {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$item->created_at)->format('s:i:H d/m/Y')}}</h1>
        
            @if ($item->phanhoiadmin != "")
            <h1 style="color: red">  Phản Hồi Từ Bên Quản Trị:{{$item->phanhoiadmin}}</h1>

            @else
            <h1> Đang chờ phản hồi từ bên quản trị,chúng tôi sẽ trả lời bạn trong thời gian sớm nhất   </h1>
            @endif
     

       
        <br>
        <a href="{{ url('/') }}" style="text-decoration: none">
            <button >
                Quay Lại Trang Chủ
            </button>
         </a> 
         <a href="{{url('/user.appointment.lichsuphanhoi/'.Auth::user()->id)}}" style="text-decoration: none" >
            <button  >
                Xem lịch sử phản hồi
            </button>     
        </a>   
    
        
    @empty
        
    @endforelse


</div>

      
          
@endsection