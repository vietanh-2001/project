@extends('layouts/user')

@section('namepage','Lịch Sử Phản Hồi')
@section('title','Lịch Sử Phản Hồi')


@section('content')
<div style="width: 100%;height: 70vh;">
<table class="table "  style="width: 1000px;text-align: center;margin: auto;margin-top:50px;margin-bottom:100px;border:1px solid black;  ">
    <tr class="table-primary">
        <th style="text-align: center">Mã Phản Hồi</th>
        <th style="text-align: center">Tên Người Đặt</th>
        <th style="text-align: center">Số Điện Thoại</th>
        <th style="text-align: center">Ngày Gửi</th>
        <th style="text-align: center">Tình Trạng</th>
    </tr>
      @forelse ($data as $data1)
                <tr>
                <td><a style="color: red" href="{{ url('user/appointment/checkphanhoi/'.$data1->id_phanhoi) }}">{{$data1->id_phanhoi}}</a></td>
                <td>
                    <b>{{$data1->name}}</b><br>
                </td>
                <td>
                    {{$data1->phone}}
                </td>
                
                <td>
                   {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$data1->created_at)->format('s:i:H d/m/Y')}}
                </td>

                <td>
                    @if ($data1->phanhoiadmin ==Null)
                        Đang chờ phản hồi từ bên quản trị
                    @else
                       <a href="{{ url('user/appointment/checkphanhoi/'.$data1->id_phanhoi) }}" style="color: red;text-decoration: none"> Có Phản hồi từ bên quản trị</a>
                    @endif
                </td>

            </tr>

         @empty
         
             <td colspan="8" style="text-align: center">Lịch sử cuộc hẹn trống</td>
         
        @endforelse        

    </tr>
</table>
<div style="margin-left:100px; ">
    <span>          
            {!! $data->withQueryString()->links() !!}
    </span>
</div>
</div>
          
@endsection