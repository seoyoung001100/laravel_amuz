<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body{
            margin: 0 auto;
            width: 1000px;
        }
        a{
            text-decoration-line: none;
            color: #ffffff;
        }
        .header{
            /* background-color: #9E8A7A; */
            margin-bottom: 10%;
            margin-top: 2%;
            height: 50px;
        }
        .HeaderLogo, .HeaderLogin{
            float:left;
            width: 50%;
            height: 50px;
            line-height : 50px;
        }
        .HeaderLogin{
            text-align: right;
            padding-right: 10px;
        }
        .HeaderLogo>a>img{
            width: 70px;
            padding-left: 10px;
        }

        li{
            list-style: none;
        }
        #dropdownMenuButton1{
            background-color: #9E8A7A;
            border: none;
            box-shadow: 0 5px 10px -7px rgb(123, 123, 123);
            border-radius: 20px;
            width: 80px;
            height: 28px;
            line-height: 20px;
        }
        #dropdown-menu{
            height: 40px;
            text-align: center;
            line-height: 17px
        }
        .dropdown-item{
            height: 20px;
        }
    </style>
</head>
<body>
    <div>
        <nav>
            <body>
                <div class="header">
                    <div class="HeaderLogo">
                        <a href="{{ url('/') }}"><img src="{{url('/imgs/LOGO.png')}}" alt="logo"></a>
                    </div>
                    <div class="HeaderLogin">
                        @guest
                            @if (Route::has('login'))
                                <button class="m-2 h-7 w-20 items-center justify-center rounded-full bg-[#9E8A7A] from-pink-600 to-pink-400 p-0 text-sm text-white shadow-md shadow-pink-[#000000] duration-150 ease-in-out" type="submit"><a href="{{ route('login') }}">{{ __('Login') }}</a></button>
                            @endif
                            @if (Route::has('register'))
                                <button class="m-2 h-7 w-20 items-center justify-center rounded-full bg-[#9E8A7A] from-pink-600 to-pink-400 p-0 text-sm text-white shadow-md shadow-pink-[#000000] duration-150 ease-in-out" type="submit"><a href="{{ route('register') }}">{{ __('Register') }}</a></button>
                            @endif
                        @else
                            <li class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <a href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                </button>
                                <ul class="dropdown-menu" id="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" 
                                            onclick="event.preventDefault(); 
                                                    document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </li>

                        @endguest
                    </div>
                </div>
            </body>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
