@extends('layouts/user')

@section('namepage','Lịch Sử Cuộc Hẹn')
@section('title','Lịch Sử Cuộc Hẹn')


@section('content')
<div style="width:100%;height: 70vh;">
<table class="table table-bodered" style="width: 1300px;text-align: center;margin-top:50px;margin-bottom:10px;border:1px solid black;margin-left:110px; ">
    <tr class="table-primary" >
        <th style="text-align: center">Mã Cuộc Hẹn</th>
        <th style="text-align: center"> Tên Người Đặt</th>
        <th style="text-align: center">Tên Bác Sĩ</th>
        <th style="text-align: center">Giờ bắt đầu</th>
        <th style="text-align: center">Giờ kết thúc(dự kiến)</th>
        <th style="text-align: center">Tình Trạng</th>
        <th colspan="2" style="text-align: center">Action</th>
    </tr>
      @forelse ($databooking as $databookings)
                <tr>
                <td><a style="color:red" href="{{ url('user/appointment/checkappointment/'.$databookings->id) }}">{{$databookings->id}}</a></td>
                <td>
                    <b>{{$databookings->name}}</b><br>
                </td>
                <td>
                    {{$databookings->name_doctor}}
                </td>
                <td>
                    {{$databookings->time_start}}
                </td>
                <td>
                    {{$databookings->time_end}}
                </td>
                <td>
                    {{$databookings->status}}
                </td>
               
                <td>
                    @if ($databookings->status == 'canceled')
                        <P>Đã Hủy Cuộc Hẹn</P>
                    @else
                    <a href="{{url('/deleteAppointment/'.$databookings->id_user.'/'.$databookings->id)}}" style="color: red">Hủy cuộc hẹn</a>   
                        
                    @endif
                </td>
            </tr>

         @empty
         
             <td colspan="8" style="text-align: center">Lịch sử cuộc hẹn trống</td>
         
        @endforelse        

    </tr>
</table>

        <div style="margin-left:100px;margin-bottom:100px; ">
            <span>          
                    {!! $databooking->withQueryString()->links() !!}
            </span>
        </div>
      
</div>
      
          
@endsection