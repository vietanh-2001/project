@extends('layouts/user')

@section('namepage','Contact Us')
@section('title','Phản Hồi')


@section('content')
<section class="location">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.6914098651696!2d105.84339435060852!3d21.005003585942525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ad5569f4fbf1%3A0x5bf30cadcd91e2c3!2zxJDhuqBJIEjhu4xDIELDgUNIIEtIT0EgQ-G7lE5HIFRS4bqmTiDEkOG6oEkgTkdIxKhB!5e0!3m2!1svi!2s!4v1629959848606!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</section>

<section class="contact-us">
    <h1 style="font-size:33px;text-align: center ">Liên hệ với chúng tôi chúng tôi sẽ phản hồi cho bạn trong 24h tới</h1>
    <div class="row">
        <div class="contact-col">
            <img src="{{ url('../images/b.jpg') }}" alt="" style="border-radius: 50px;width:90%; ">
        </div>
        
        

        <div class="contact-col">
            
            <form method="POST" >
                @csrf
                <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                <input type="text" style="font-size:13px;border-radius:20px;  " name="name" placeholder="Nhập Họ Tên Của Bạn"  >
                <span class="text-danger">@error('phone'){{ $message }} @enderror</span>
                <input type="text" style="font-size:13px;border-radius:20px;" name="phone" placeholder="Nhập Số Điện Thoại Của Bạn">
                
                <input type="hidden" name="id_user" value="{{Auth::user()->id}}" >
                <span class="text-danger">@error('purpose'){{ $message }} @enderror</span>
                <textarea name="purpose" id="" style="font-size:13px; " rows="8" placeholder="Nhập phản hồi của bạn đến chúng tôi "></textarea>
                <br>
                Phản hồi về lí do
                <select name="to" id="" style="width: 300px;">
                    <option value="chuyenmon">Chuyên Môn</option>
                    <option value="admin">Quản Lí,Thái Độ Phục Vụ</option>
                </select>
                <br>
                <br>
                <button type="submit" class="btn" style="color: black;border: 1px solid black;margin-top:20px; ">Contact Us</button>
            </form>
        </div>
    </div>
</section>
      
          
@endsection