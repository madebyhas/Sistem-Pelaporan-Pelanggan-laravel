@extends('layouts.user')

@section('css')
<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
@endsection

@section('title', 'Lokajaya Surya Mahardika - Home')

@section('content')

{{-- Section Header --}}
<section class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
        <div class="container">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <h4 class="semi-bold mb-0 text-white"><img src="images/ptlokajayasm.png" alt="lokajaya"
                            width="150px"></h4>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navb ar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav text-center ml-auto">
                        <li class="nav-item mx-3">
                            <a class="nav-link text-white "> PELAPORAN KELUHAN PELANGGAN</a>
                        </li>
                        @if(Auth::guard('pelanggan')->check())
                        <li class="nav-item mx-3">
                            <a class="nav-link text-white" href="{{ route('pelukan.laporan') }}"><i
                                    class="fa fa-file-text" aria-hidden="true"></i> KELUHAN</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link text-white" href="{{ route('pelukan.logout') }}"
                                style="text-decoration: underline"><i class="fa fa-sign-out" aria-hidden="true"></i>
                                LOGOUT Dari {{ Auth::guard('pelanggan')->user()->nama }}</a>
                        </li>
                        @else

                        <div class="dropdown mx-3">
                            <button class="btn btn-light" type="button" data-toggle="modal" data-target="#loginModal">
                                MASUK
                            </button>
                            @endauth
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="text-center py-5">
        <h1 class="large text-white mt-3">Selamat Datang!</h1>
        <h3 class="medium text-white mt-3">Pelaporan Keluhan Layanan PT. Lokajaya Surya Mahardika</h3>
        <p class="italic text-white mb-5">Laporkan keluhan Anda terkait layanan perusahaan langsung kepada perusahaan
        </p>
    </div>

    <div class="wave wave1"></div>
    <div class="wave wave2"></div>
    <div class="wave wave3"></div>
    <div class="wave wave4"></div>
</section>

@if(Auth::guard('pelanggan')->check())
{{-- Section Card pelaporan --}}
<div class="row justify-content-center">
    <div class="col-lg-6 col-10 col">
        <div class="content shadow">

            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
            @endif

            @if (Session::has('keluhan'))
            <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('keluhan') }}</div>
            @endif

            <div class="card mb-3">Tulis Laporan Disini</div>
            <form action="{{ route('pelukan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <textarea name="isi_keluhan" placeholder="Masukkan Isi Laporan" class="form-control"
                        rows="4">{{ old('isi_keluhan') }}</textarea>
                </div>
                <div class="form-group">
                    <input type="file" name="foto" class="form-control">
                </div>
                <button type="submit" class="btn btn-custom mt-2">Kirim</button>
            </form>
        </div>
    </div>
</div>
@else
@endauth

{{-- Section alur pelaporan--}}
<section id="alur" class="hero py-5">
    <div class="container">
        <div class="card-columns">
            <div class="card">
                <img src="images/11.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Login</h5>
                    <p class="card-text">1. Login terlebih dahulu dengan mengklik Masuk, jika Anda belum mempunyai hak
                        akses untuk masuk klik tombol Daftar .</p>

                </div>
            </div>
            <div class="card p-3">
                <img src="images/66.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Selesai</h5>
                    <p class="card-text">6. Pemberitahuan laporan telah selesai dilakukan dapat juga dilihat didalam web
                        Anda!</p>

                </div>
            </div>
            <div class="card">
                <img src="images/22.png" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">Lapor</h5>
                    <p class="card-text">2. Laporkan keluhan Anda dengan mengisikan tabel yang disediakan.</p>
                </div>
            </div>
            <div class="card bg-success text-white text-center p-3">
                <blockquote class="blockquote mb-0">
                    <h3>Alur Pelaporan Keluhan Layanan</h3>
                    <p>PT. Lokajaya Surya Mahardika</p>
                </blockquote>
            </div>
            <div class="card">
                <img src="images/55.png" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">Monitor</h5>
                    <p class="card-text">5. Anda juga dapat memonitor laporan keluhan yang dilaporkan.</p>
                </div>
            </div>
            <div class="card">
                <img src="images/33.png" class="card-img-top" alt="...">
                <div class="card-body text-right">
                    <h5 class="card-title ">Respon</h5>
                    <p class="card-text">3. Admin akan merespon keluhan anda, dengan melaporkan kepada petugas yang
                        bertanggung jawab.</p>
                </div>
            </div>
            <div class="card p-3">
                <img src="images/44.png" class="card-img-top" alt="...">
                <div class="card-body text-right">
                    <h5 class="card-title">Proses</h5>
                    <p class="card-text">4. Petugas yang mendapat Laporan akan langsung memproses keluhan anda sesuai
                        dengan urutan pelaporan yang masuk.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer style="background-color: green;">
    <div class="container" style="color: white;">
        <div class="row justify-content-around mt-3">
            <div class="col-md-4">
                <div class="card-body">
                    <img src="images/ptlokajayasm.png" alt="Laporkan" width="140px">
                    <p class="card-text py-4">PT. LOKAJAYA SURYA MAHARDIKA memiliki kompetensi bisnis di bidang usaha
                        Software Development, IT Learning Center, Telekomunikasi & Jaringan serta Web Design dan
                        Multimedia. </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-body">
                    <h5 class="card-title">Kontak</h5>
                    <i>
                        <p class="card-text py-3"><i class="fa fa-envelope-o"></i> Info@lokajaya-sm.co.id</p>
                    </i>
                    <p class="card-text"><i class="fa fa-map-marker"></i> Head Office</p>
                    <p class="card-text">Kedungdowo Gg Aman 6, Kecamatan Kaliwungu, Kab. Kudus, Jawa Tengah.</p>
                    <p class="card-text"><i class="fa fa-phone" aria-hidden="true"></i><strong> Telp.</strong> <i>+62
                            877-7896-3999</i></p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-body">
                    <h5 class="card-title">Alamat</h5>
                    <img src="images/alamat.png" alt="login" class="card-img-top py-3" width="200px">
                </div>
            </div>
        </div>
    </div>
    </div>
</footer>


{{-- Modal --}}
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="images/logolokajayasm.png" alt="lokajaya" width="150px">
                <h2 class="mt-3"><strong>MASUK</strong></h2>
                <p>Silahkan masuk menggunakan akun yang sudah didaftarkan.</p>
                <form action="{{ route('pelukan.login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="text-left">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="text-left">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-purple text-white mt-3" style="width: 100%">MASUK</button>
                </form>
                @if (Session::has('pesan'))
                <div class="alert alert-danger mt-2">
                    {{ Session::get('pesan') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@if (Session::has('pesan'))
<script>
    $('#loginModal').modal('show');

</script>
@endif
@endsection