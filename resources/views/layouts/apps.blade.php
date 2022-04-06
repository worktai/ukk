<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- buat modal --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title></title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    @yield('style')

    {{-- BOOTSTRAP ICON --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="font-family: arial;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
                </a> --}}
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <ul class="navbar-nav mr-auto">
                        <a class="navbar-brand"><i class="bi bi-shop"></i> WebKasir</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <nav class="collapse navbar-collapse" id="navbarNavAltMarkup">

                            {{-- ADMIN DIBAWAH --}}
                            @if(auth()->user()->level=="Admin")
                            <div class="navbar-nav">
                                <a class="nav-link active" aria-current="page" href="{{route('utama')}}">Aktivitas Pegawai</a>
                            </div>
                            <div class="navbar-nav">
                                <a class="nav-link active" aria-current="page" href="{{route('index')}}">Peran User</a>
                            </div>

                            {{-- KASIR DIBAWAH --}}
                            @elseif(auth()->user()->level=="kasir")
                            <div class="navbar-nav">
                                <a class="nav-link active" aria-current="page" href="{{route('catatan_transaksi')}}"><i class="bi bi-piggy-bank"></i> Catatan Transaksi</a>
                            </div>
                            <div class="navbar-nav">
                                <a class="nav-link active" aria-current="page" href="{{route('dpesan.index')}}"><i class="bi bi-cart"></i> Pesan Order</a>
                            </div>

                            {{-- MANEJER DIBAWAH --}}
                            @elseif(auth()->user()->level=="manejer")
                            <div class="navbar-nav">
                                <a class="nav-link active" aria-current="page" href="{{route('menu.index')}}">Menu Makanan/Minuman</a>
                            </div>
                            <div class="navbar-nav">
                                <a class="nav-link active" aria-current="page" href="{{route('note')}}">Catatan transaksi</a>
                            </div>
                            <div class="navbar-nav">
                                <a class="nav-link active" aria-current="page" href="{{route('kategori.index')}}">Kategori</a>
                            </div>
                            <div class="navbar-nav">
                                <a class="nav-link active" aria-current="page" href="{{route('meja.index')}}">Meja</a>
                            </div>
                            @endif

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->


                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li> -->
                        @endif
                        @else

                        <a class="text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <!--                                 
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            
                            </div>
                        </li> -->
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- @yield('script') -->
    </div>
</body>
</html>
