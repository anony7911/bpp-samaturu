<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@hasSection('title') @yield('title') | @endif
        {{ config('app.name', 'SPK Pestisida Tanaman Padi') }}</title>

    <!-- Scripts -->
    @livewireStyles
    <link rel="shortcut icon" href="{{ url('/') }}/assets/bpp.png">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/feather/feather.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/icons/flags/flags.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/style.css">
</head>

<body>
    <div class="main-wrapper">

        <div class="header">

            <div class="header-left">
                <a href="#" class="logo">
                    <h5 class="text-primary">
                        <img src="assets/bpp.png" alt="Logo"> 
                        BPP Samaturu
                    </h5>
                </a>
                <a href="#" class="logo logo-small">
                    <img src="assets/bpp.png" alt="Logo" width="30" height="30">
                </a>
            </div>
            <div class="menu-toggle">
                <a href="javascript:void(0);" id="toggle_btn">
                    <i class="fas fa-bars"></i>
                </a>
            </div>

            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>

            <ul class="nav user-menu">


                <li class="nav-item dropdown has-arrow new-user-menus">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="assets/img/profiles/avatar-01.jpg" width="31"
                                alt="admin">
                            <div class="user-text">
                                <h6>{{ Auth::check() ? Auth::user()->name : '' }}</h6>
                                <p class="text-muted mb-0">{{ Auth::check() ? Auth::user()->email : '' }}
                                </p>

                            </div>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="assets/img/profiles/avatar-01.jpg" alt="User Image"
                                    class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6>{{ Auth::check() ? Auth::user()->name : '' }}</h6>
                                <p class="text-muted mb-0">{{ Auth::check() ? Auth::user()->email : '' }}
                                    <a class="text-muted mb-0" href="#">{{ Auth::check() ? Auth::user()->role : '' }}</a>
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>

            </ul>

        </div>


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    @auth()
                    <ul class="navbar-nav mr-auto">
                        <li class="menu-title">
                            <span>Main Menu</span>
                        </li>
                        <!--Nav Bar Hooks - Do not delete!!-->
						<li class="nav-item @if(Request::segment(1) == 'home') active @endif">
                            <a href="{{ url('/home') }}" class="nav-link"><i class="feather-home text-info"> </i> Beranda</a>
                        </li>
                        @if(Auth::user()->role == 'admin')
						<li class="nav-item @if(Request::segment(1) == 'users') active @endif">
                            <a href="{{ url('/users') }}" class="nav-link"><i class="feather-user text-info"> </i> Manajemen User</a>
                        </li>
						<li class="nav-item @if(Request::segment(1) == 'petanis') active @endif">
                            <a href="{{ url('/petanis') }}" class="nav-link"><i class="feather-users text-info"> </i> Kelompok Tani</a>
                        </li>
						<li class="nav-item @if(Request::segment(1) == 'alternatifs') active @endif">
                            <a href="{{ url('/alternatifs') }}" class="nav-link"><i class="fa fa-list text-info"></i> Alternatif</a>
                        </li>
						<li class="nav-item @if(Request::segment(1) == 'kriterias') active @endif">
                            <a href="{{ url('/kriterias') }}" class="nav-link"><i class="feather-layers text-info"></i> Kriteria</a>
                        </li>
						<li class="nav-item @if(Request::segment(1) == 'kecocokan') active @endif">
                            <a href="{{ url('/kecocokan') }}" class="nav-link"><i class="feather-award text-info"></i> Rating Kecocokan</a>
                        </li>
                        <li class="nav-item @if(Request::segment(1) == 'hasil') active @endif">
                            <a href="{{ url('/hasil') }}" class="nav-link"><i class="feather-file-text text-info"></i> Hasil Perhitungan</a>
                        </li>
                        @endif
                        <li class="nav-item @if(Request::segment(1) == 'rekomendasi') active @endif">
                            <a href="{{ url('/rekomendasi') }}" class="nav-link"><i class="feather-check-circle text-info"></i> Hasil Rekomendasi</a>
                        </li>
                        @if(Auth::user()->role == 'admin')
                        <li class="nav-item @if(Request::segment(1) == 'laporan') active @endif">
                            <a href="{{ url('/laporan') }}" class="nav-link"><i class="feather-printer text-info"></i> Laporan</a>
                        </li>
                        @endif
                    </ul>
                    @endauth()
                </div>
            </div>
        </div>


        <div class="page-wrapper">
            <div class="content container-fluid">
                @yield('content')

                <footer>
                    <p>Copyright © 2023 SPK Pestisida Tanaman Padi.</p>
                </footer>
            </div>
        </div>
    </div>
    @livewireScripts
    <script type="module">
        const addModal = new bootstrap.Modal('#createDataModal');
        const editModal = new bootstrap.Modal('#updateDataModal');
        window.addEventListener('closeModal', () => {
            addModal.hide();
            editModal.hide();
        })
    </script>
    <script src="{{ url('/') }}/assets/js/jquery-3.6.0.min.js"></script>
    <script src="{{ url('/') }}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/') }}/assets/js/feather.min.js"></script>
    <script src="{{ url('/') }}/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{{ url('/') }}/assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="{{ url('/') }}/assets/plugins/apexchart/chart-data.js"></script>
    <script src="{{ url('/') }}/assets/js/script.js"></script>
</body>

</html>
