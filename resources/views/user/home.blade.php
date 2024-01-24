<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script> --}}
   <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
        <section class="header">
            <nav>
                <a href="index.html"><img src="{{asset('images/logo123123.png')}}" ></a>
                <div class="nav-link">
                    <ul>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{ asset('user.appointment.index') }}">Doctor</a></li>
                        <li><a href="{{url('/phanhoi')}}">Contact us</a></li>
                        @if (Route::has('login'))

                        @auth
                        
                        <li class="dropdown" >
                            <a href="" class="dropdown-toggle"  data-toggle="dropdown"><span>{{ Auth::user()->name }}</span> <span class="glyphicon glyphicon-cog"></span><span class="caret"></a>
                                <ul class="dropdown-menu" style="margin-left: 50px" >
                                    <li style="all: initial" >
                                        <a href="{{ asset('user.profile') }}"  style="color:black;font-size: 14px;text-align: center; ">
                                            <span class="glyphicon glyphicon-user"></span> {{ __('Profile') }}
                                        </a>
                                    </li>
                                    <li style="all: initial" >
                                        <a href="{{ url('/user.appointment.lichsubooking/'.Auth::user()->id) }}"  style="color:black;font-size: 14px;text-align: center">
                                            <span class="glyphicon glyphicon-user"></span> {{ __('Lịch sửa cuộc hẹn') }}
                                        </a>
                                    </li>

                                    <li style="all: initial" >
                                        <a href="{{ url('/user.appointment.lichsuphanhoi/'.Auth::user()->id) }}"  style="color:black;font-size: 14px;text-align: center">
                                            <span class="glyphicon glyphicon-user"></span> {{ __('Lịch sửa Phản Hồi') }}
                                        </a>
                                    </li>
                                    <li style="all: initial" >
                                        <a href="{{ asset('user.doimatkhau') }}"  style="color:black;font-size: 14px;text-align: center">
                                            <span class="glyphicon glyphicon-user"></span> {{ __('Đổi Mật khẩu') }}
                                        </a>
                                    </li>
                                    <li style="all: initial" >
                                        <a href="{{ asset('user.baomathailop') }}"  style="color:black;font-size: 14px;text-align: center">
                                            <span class="glyphicon glyphicon-user"></span> {{ __('Bảo mật hai lớp') }}
                                        </a>
                                    </li>
                                    <li style="all: initial" >
                                        <a href="{{ asset('user.lichsudangnhap') }}"  style="color:black;font-size: 14px;text-align: center">
                                            <span class="glyphicon glyphicon-user"></span> {{ __('Lịch sử đăng nhập') }}
                                        </a>
                                    </li>

                                    <li style="all: initial" >
                                        <a href="{{ asset('user.delete') }}"  style="color:black;font-size: 14px;text-align: center">
                                            <span class="glyphicon glyphicon-user"></span> {{ __('Xóa Tài Khoản') }}
                                        </a>
                                    </li>
                                    <li style="all: initial" >
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                        
                                            <a  style="color:black;font-size: 14px;margin-left: 28%;" href="{{ route('logout') }}"
                                                           onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                                 <span class="glyphicon glyphicon-arrow-left"></span> {{ __('Log Out') }}
                                        </a>
                                        </form>
                                    </li>

                                </ul>
                            </li>            
                            
                        @else
                            <li><a href="{{ route('login') }}"> <button type="button" class="btn btn-primary" >Login</button></a></li>
                        @endauth
                            
                        @endif
                     
            
                    </ul>
                </div>
            </nav>
            
                
           
         <div class="text">
             <h1>Bạn Trao tôi niềm tin tôi <br>
                 trao bạn sức khỏe <i class="fa fa-heart" style="font-size: 30px;color:red;" ></i></h1>
             <h2><a href="{{url('user.appointment.index')}}" class="btn1" >Booking Appointment</a></h2>
         </div>   
        </section>

        <section class="course">
            <h1  style="color: red"><strong>Phòng Khám TM Healthy</strong> </h1>
            <p> Bạn Trao Tôi Niềm Tin Tôi Trao Bạn Sức Khỏe</p>

            <div class="row">
                <div class="course-col" style="background-image: linear-gradient(rgba(178, 183, 206, 0.7),rgba(58, 68, 110, 0.7)),url(../images/d.jpg);
                background-position: center;
                background-size: cover;
                position: relative;">
                    <h3 style="color: red;font-size:25px; ">Thương Hiệu</h3>
                    <p style="color: white;">Là thương hiệu uy tín lâu năm,
                          Bệnh viện thẩm mỹ Kangnam tạo dựng niềm tin mạnh mẽ, khẳng định 
                        vị thế uy tín trên thị trường làm đẹp hiện nay
                    </p>
                </div>
                <div class="course-col"  style="background-image: linear-gradient(rgba(178, 183, 206, 0.7),rgba(58, 68, 110, 0.7)),url(../images/anhphongkham.jpg);
                background-position: center;
                background-size: cover;
                position: relative;">
                    <h3 style="color: red;font-size:25px; ">Công Nghệ</h3>
                    <p style="color: white;"> Xu thế hiện đại, an toàn  cao với chi phí thích hợp,…TM sẽ liên 
                        tục cập nhật và ứng dụng công nghệ. Đặc biệt phải kể tới các 
                        công nghệ thẩm mỹ theo tiên tiến </p>
                </div>
                <div class="course-col" style="background-image: linear-gradient(rgba(178, 183, 206, 0.7),rgba(58, 68, 110, 0.7)),url(../images/609d968b5630ac6ef521.jpg);
                background-position: center;
                background-size: cover;
                position: relative;">
                    <h3 style="color: red;font-size:25px; ">Đội ngũ </h3>
                    <p style="color: white;">Bác sĩ đều đảm bảo được đào tạo chuyên sâu, tiếp nhận và chuyển giao công nghệ hiện đại
                        và có ít nhất 5 năm kinh nghiệm trong nghể </p>
                </div>
            </div>
        </section>
        <section class="anh">
            <h1>Các bác sĩ xuất sắc nhất</h1>
            <div class="row" style="margin-top:-8px; ">
                <div class="anh-col" > 
                    <img src="{{ asset('images/1.jpg') }}" height="100%" alt="">
                    <div class="layer">
                        <a href="{{ asset('/user/appointment/informationdoctor/24') }}"><h3 style="color: red"><i style="color: red" class="fa fa-search"></i><br>Click Để Xem thêm thông tin</h3></a>
                    </div>
                </div>
                <div class="anh-col">
                    <img src="{{ asset('images/6.jpg') }}" height="100%" alt="">
                    <div class="layer">
                        <a href="{{ asset('/user/appointment/informationdoctor/25') }}"><h3 style="color: red"><i style="color: red" class="fa fa-search"></i><br>Click Để Xem thêm thông tin</h3></a>
                    </div>
                </div>
                <div class="anh-col">
                    <img src="{{ asset('images/5.jpg') }}" height="100%" alt="">
                    <div class="layer">
                        <a href="{{ asset('/user/appointment/informationdoctor/23') }}"><h3 style="color: red"><i style="color: red" class="fa fa-search"></i><br>Click Để Xem thêm thông tin</h3></a>
                    </div>
                </div>
                
            </div>

        </section>
        <section class="thongtin">
            <h1 style="color: red"><strong>Cơ Sở vật chất phòng Khám TM Healthy</strong> </h1>
            <p>Được đánh giá là một trong những phòng khám với công nghệ hiện đại nhất</p>
            <div class="row">
                    <div class="thongtin-col">
                        <img src="{{ asset('images/anhphongkham.jpg') }}" alt="">
                        <h2 style="margin-top:5px;text-align: center;color: red ">
                            Phòng mổ </h2>
                            <p style="text-align: center;font-size: 20px" >
                                
                            Vinmec
                            Hệ thống Phòng mổ Hybrid hiện đại nhất Việt Nam
                            </p>
                       
                    </div>

                    <div class="thongtin-col">
                        <img src="{{ asset('images/609d968b5630ac6ef521.jpg') }}" height="72%" alt="">
                        <h2 style="margin-top:5px;text-align: center;color: red ">
                           Phòng bệnh</h2>
                            <p style="text-align: center;font-size: 20px" >
                                
                            Thoáng mát,sạch sẽ,có bác sĩ chăm sóc 24/24
                            </p>
                       
                    </div>

                    <div class="thongtin-col">
                        <img src="{{ asset('images/Xet-nghiem-HIV-Dong-Nai.jpeg') }}" height="72%" alt="">
                        <h2 style="margin-top:5px;text-align: center;color: red ">
                            Máy Móc</h2>
                            <p style="text-align: center;font-size: 20px" >
                                
                            Các máy xét nghiệm hiện đại nhất cho ra kết quả nhanh , chính xác nhất
                        </p>
                       
                    </div>
            </div>
        </section>

        <section class="danhgia">
            <h1 style="color: red"><strong>Phòng Khám TM Healthy</strong> </h1>
         
            <div class="row">
                <div class="danhgia-col">
                    <img src="{{ asset('images/user1.jpg') }}" alt="">
                    <h3>Khách hàng :Cao Nam Truong</h3>
                    <span style="padding-top:50px ;margin-left:-268px">
                        Độ hài Lòng:
                    <i class="fa fa-star" style="color: rgb(219, 206, 19);font-size: 15px;"  ></i>
                    <i class="fa fa-star" style="color: rgb(219, 206, 19);font-size: 15px;" ></i>
                    <i class="fa fa-star" style="color: rgb(219, 206, 19);font-size: 15px;" ></i>
                    <i class="fa fa-star" style="color: rgb(219, 206, 19);font-size: 15px;" ></i>
                    <i class="fa fa-star" style="color: rgb(219, 206, 19);font-size: 15px;" ></i>
                    <i class="fa fa-star-half-o" style="color: rgb(219, 206, 19);font-size: 15px;"  ></i> 
                    </span>
                </div>
                <div class="danhgia-col">
                    <img src="{{ asset('images/user2.jpg') }}" alt="">
                    <h3>Khách hàng:Bùi Tuấn Minh</h3>
                    <br>
                    <span style="padding-top:50px ;margin-left:-235px">
                        Độ hài Lòng:
                       <i class="fa fa-star" style="color: rgb(219, 206, 19);font-size: 15px;" ></i>
                       <i class="fa fa-star" style="color: rgb(219, 206, 19);font-size: 15px;" ></i>
                       <i class="fa fa-star" style="color: rgb(219, 206, 19);font-size: 15px;" ></i>
                       <i class="fa fa-star" style="color: rgb(219, 206, 19);font-size: 15px;" ></i>
                       <i class="fa fa-star" style="color: rgb(219, 206, 19);font-size: 15px;"  ></i>
                       <i class="fa fa-star-half-o" style="color: rgb(219, 206, 19);font-size: 15px;"  ></i> 
                   </span>
                 
                </div>
            </div>
        </section>

        <section class="contact">
            <h1>Nếu bạn có ván đề cần giải quyết hãy liên hệ với chúng tôi</h1>
            <h1>Chúng tôi sẽ trả lời bạn trong vòng 24 tiếng </h1>
            <a href="{{ url('/phanhoi') }}" class="btn">ConTact US</a>
        </section>

        <section class="footer">
            <div class="container-fluid pb-0 mb-0 justify-content-center text-light ">
                <footer>
                    <div class="row my-5 justify-content-center py-5">
                        <div class="col-11">
                            <div class="row ">
                                <div class="col-xl-8 col-md-4 col-sm-4 col-12 my-auto mx-auto a">
                                    <h3 style="color: rgb(202, 42, 42);font-size: 40px;">TM Healthy <i class="fa fa-heart" aria-hidden="true"></i></h3>
                                </div>
                                <div class="col-xl-2 col-md-4 col-sm-4 col-12">
                                    <h1 style="font-size:38px;color: rgb(202, 42, 42);" ><b>MENU</b></h1>
                                    <ul>
                                        <li><h3><i class="fa fa-home" aria-hidden="true"></i> Home</h3></li>
                                        <li><h3><i class="fa fa-share" aria-hidden="true"></i> About US</h3></li>
                                        <li><h3><i class="fa fa-picture-o" aria-hidden="true"></i> Blog</h3></li>
                                    </ul>
                                </div>
                                <div class="col-xl-2 col-md-4 col-sm-4 col-12" >
                                    <h1 style="font-size:38px;color: rgb(202, 42, 42);" ><b>ADDRESS</b></h1>
                                    <h3><i class="fa fa-building-o" aria-hidden="true"></i></i> Như Quỳnh-Văn Lâm-Hưng Yên-Việt Nam</h3>
                                    
                                </div>
                            </div>
                            <div class="row " >
                                <div class="col-xl-8 col-md-4 col-sm-4 col-auto my-md-0 mt-5 order-sm-1 order-3 align-self-end">
                                    <p class="social text-muted mb-0 pb-0 bold-text" style="margin-left: 80px;"> <span class="mx-2"><i  style="color: white;;font-size:30px; " class="fa fa-facebook" aria-hidden="true"></i></span> <span class="mx-2"><i style="color: white;;font-size:30px; " class="fa fa-linkedin-square" aria-hidden="true"></i></span> <span class="mx-2"><i style="color: white;;font-size:30px; " class="fa fa-twitter" aria-hidden="true"></i></span> <span class="mx-2"><i style="color: white;;font-size:30px; " class="fa fa-instagram" aria-hidden="true"></i></span> </p><small class="rights"><h1><span>&#174;</span> Pepper All Rights Reserved.</h1></small>
                                </div>
                                <div class="col-xl-2 col-md-4 col-sm-4 col-auto order-1 align-self-end ">
                                    <h6 class="mt-55 mt-2 "  style="color: rgb(202, 42, 42);font-size: 20px;"><b>Email</b></h6><small> <span> <h5><i class="fa fa-envelope" aria-hidden="true"></i></span>caotruong.work@gmail.com</h5></small>
                                </div>
                                <div class="col-xl-2 col-md-4 col-sm-4 col-auto order-2 align-self-end mt-3 ">
                                    <h6  style="color: rgb(202, 42, 42);font-size: 20px;"><b>Phone</b></h6><small><span><h5><i class="fa fa-phone" aria-hidden="true"></i></span>+9881230132</h5></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </section>
</body>
</html>