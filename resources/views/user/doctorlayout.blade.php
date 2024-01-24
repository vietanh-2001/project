<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        @section('header')
        <header>
            <div class="sub-header">
                <nav>
                    <a href=""><img src="{{ asset('images/logo123123.png') }}"></a>
                    <div class="nav-link">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Doctor</a></li>
                            <li><a href="">Contact us</a></li>
                            @if (Route::has('login'))

                        @auth
                        
                        <li class="dropdown" >
                            <a href="" class="dropdown-toggle"  data-toggle="dropdown"><span>{{ Auth::user()->name }}</span> <span class="glyphicon glyphicon-cog"></span><span class="caret"></a>
                                <ul class="dropdown-menu" style="width: 10px;margin-left: 70px" >
                                    <li style="all: initial" >
                                        <a href="{{ route('profile.show') }}"  style="color:black;font-size: 14px;text-align: center">
                                            <span class="glyphicon glyphicon-user"></span> {{ __('Profile') }}
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
            </div>
            
        </header>
    @show

        

            <!-- Page Heading -->
         <section>
            @yield('content')     
        </section>   


            <!-- Page Content -->
            {{-- <main>
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.logout-other-browser-sessions-form')
                </div>
            </main> --}}


        @section('footer')

        @stack('modals')

        @livewireScripts
            <section class="footer">
                <h4>Cao Nam Truong</h4>
                <p>akdskakdaskd</p>
            <div class="icons">
                <i class="fa fa-facebook" ></i>
                <i class="fa fa-twitter" ></i>
            <i class="fa fa-instagram" ></i>
                <i class="fa fa-youtube" ></i>
            </div>
            <p >Copyright © 2018-2021 KLC.Send To My Wife In The Future With <i class="fa fa-heart" ></i></p>
        </section>
     @show   

        @stack('modals')

        @livewireScripts
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html>