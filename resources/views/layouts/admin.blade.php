<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>   
    @yield('css')    

    <link rel="stylesheet" href="{{ asset('css/admin3.css') }}">
    <style>
        .btn-purple {
            background: green;
            border: 1px solid green;
            color: #fff;
        }
        .btn-purple:hover {
            background: green;
            border: 1px solid green;
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="{{ asset('images/ptlokajayasm.png') }}"  alt="lokajaya" width="100%">  
            </div>
            <ul class="list-unstyled components">
                <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.index') }}"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
                </li>
                <li class="{{ Request::is('admin/pelaporan') ? 'active' : '' }}">
                    <a href="{{ route('keluhan.index') }}"><i class="fa fa-file-text" aria-hidden="true"></i> Pelaporan</a>
                </li>
                <hr>
                @if(Auth::guard('admin')->user()->level == 'admin')
                <li class="{{ Request::is('admin/proyek') ? 'active' : '' }}">
                    <a href="{{ route('proyek.index') }}"><i class="fa fa-server" aria-hidden="true"></i> Proyek</a>
                </li>
                <li class="{{ Request::is('admin/pelanggan') ? 'active' : '' }}">
                    <a href="{{ route('pelanggan.index') }}"><i class="fa fa-users" aria-hidden="true"></i> Pelanggan</a>
                </li>
                <li class="{{ Request::is('admin/petugas') ? 'active' : '' }}">
                    <a href="{{ route('petugas.index') }}"><i class="fa fa-user" aria-hidden="true"></i> Petugas</a>
                </li>
                <li class="{{ Request::is('admin/laporan') ? 'active' : '' }}">
                    <a href="{{ route('laporan.index') }}"><i class="fa fa-file-text" aria-hidden="true"></i> Laporan</a>
                </li>
                <hr>
                @else
                @endauth
                <li class="{{ Request::is('admin/logout') ? 'active' : '' }}">
                    <a href="{{ route('admin.logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                  </li>
            </ul>
        </nav>

        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-success">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <div class="text-white ml-2"><strong>@yield('header')</strong></div>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <a href="" class="btn btn-light text-success"><i class="fa fa-user" aria-hidden="true"></i> {{ Auth::guard('admin')->user()->nama_petugas }}</a>
                        </ul>
                    </div>
                </div>
            </nav>
            @yield('content')
        </div>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.4/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });

    </script>

    @yield('js')
    </body>

</html>
