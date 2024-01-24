<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Xóa Tài Khoản</title>

        <!-- Fonts -->
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
        
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
       

        <section>
            <header>
                <div class="sub-header">
                    <nav>
                        <a href=""><img src="{{asset('images/logo123123.png') }}"></a>
                        <div class="nav-link">
                            <ul>
                                <li><a href="{{ asset('/') }}">Home</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="{{ url('/user.appointment.index') }}">Doctor</a></li>
                                <li><a href="{{ asset('/phanhoi') }}">Contact us</a></li>
                                @if (Route::has('login'))
    
                            @auth
                            
                            <li class="dropdown" >
                                <a href="" class="dropdown-toggle"  data-toggle="dropdown"><span>{{ Auth::user()->name }}</span> <span class="glyphicon glyphicon-cog"></span><span class="caret"></a>
                                    <ul class="dropdown-menu" style="margin-left: 50px" >
                                        <li style="all: initial" >
                                            <a href="{{ asset('user.profile') }}"  style="color:black;font-size: 14px;text-align: center">
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
                                <li><a href="{{ route('login') }}"> <button type="button" class="btn btn-primary">Login</button></a></li>
                            @endauth
                                
                            @endif
                    
                            </ul>
                        </div>
                    </nav>
                    <a href="" class="btn" style="font-size: 20px">Xóa Tài Khoản</a>
                </div>
                
            </header>
        </section>
          

            

         
        <!-- Page Content -->
        
        <section>
            <div class="container" style="padding-top: 5%">

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            </div>
        </section>
   
        <section class="footer" style="margin-top:100px; ">
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
                                        <li style="font-size: 20px;"><h3><i class="fa fa-home" aria-hidden="true"></i> Home</h3></li>
                                        <li style="font-size: 20px;"><h3><i class="fa fa-share" aria-hidden="true"></i> About US</h3></li>
                                        <li style="font-size: 20px;"><h3><i class="fa fa-picture-o" aria-hidden="true"></i> Blog</h3></li>
                                    </ul>
                                </div>
                                <div class="col-xl-2 col-md-4 col-sm-4 col-12" >
                                    <h1 style="font-size:38px;color: rgb(202, 42, 42);" ><b>ADDRESS</b></h1>
                                    <h3 style="font-size: 20px;"><i class="fa fa-building-o" aria-hidden="true"></i></i> Như Quỳnh-Văn Lâm-Hưng Yên-Việt Nam</h3>
                                    
                                </div>
                            </div>
                            <div class="row " >
                                <div class="col-xl-8 col-md-4 col-sm-4 col-auto my-md-0 mt-5 order-sm-1 order-3 align-self-end">
                                    <p class="social text-muted mb-0 pb-0 bold-text" style="margin-left: 20px;"> <span class="mx-2"><i  style="color: white;;font-size:30px; " class="fa fa-facebook" aria-hidden="true"></i></span> <span class="mx-2"><i style="color: white;;font-size:30px; " class="fa fa-linkedin-square" aria-hidden="true"></i></span> <span class="mx-2"><i style="color: white;;font-size:30px; " class="fa fa-twitter" aria-hidden="true"></i></span> <span class="mx-2"><i style="color: white;;font-size:30px; " class="fa fa-instagram" aria-hidden="true"></i></span> </p><small class="rights"><h1 style="font-size:20px; "><span>&#174;</span> Pepper All Rights Reserved.</h1></small>
                                </div>
                                <div class="col-xl-2 col-md-4 col-sm-4 col-auto order-1 align-self-end ">
                                    <h6 class="mt-55 mt-2 "  style="color: rgb(202, 42, 42);font-size: 20px;"><b>Email</b></h6><small> <span> <h5 style="font-size: 10px;"><i class="fa fa-envelope" aria-hidden="true"></i></span>+caotruong.work@gmail.com</h5></small>
                                </div>
                                <div class="col-xl-2 col-md-4 col-sm-4 col-auto order-2 align-self-end mt-3 ">
                                    <h6  style="color: rgb(202, 42, 42);font-size: 20px;"><b>Phone</b></h6><small><span><h5 style="font-size: 10px;"><i class="fa fa-phone" aria-hidden="true"></i></span>+9881230132</h5></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </section>
        

        @stack('modals')

        @livewireScripts
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script> --}}
        
    </body>
</html>