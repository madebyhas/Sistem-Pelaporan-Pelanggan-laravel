@extends('layouts.user')

@section('css')
<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
<link rel="stylesheet" href="{{ asset('css/laporan.css') }}">
@endsection

@section('title', 'PELUKAN - Pelaporan Keluhan Layanan')

@section('content')

{{-- Section Laporan --}}
<section class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
        <div class="container">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <h4 class="semi-bold mb-0 text-white"><img src="{{ asset("images/ptlokajayasm.png") }}" alt="lokajaya" width="150px"></h4>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav text-center ml-auto">
                        <li class="navalue-item mx-3">
                            <a class="nav-link text-white " href="/"><i class="fa fa-home" aria-hidden="true"></i>  Home</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link text-white " href="#Respon"><i class="fa fa-book" aria-hidden="true"></i>  Respon</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="text-center py-5">
        <h1 class="large text-white mt-3">Halaman Respon</h1>
        <h3 class="medium text-white mt-3">Pelaporan Keluhan Layanan PT. Lokajaya Surya Mahardika</h3>
        <p class="italic text-white mb-5">Pelanggan Dapat Memonitoring Pelaporan Keluhan Layanan </p>
    </div>

    <div class="wave wave1"></div>
    <div class="wave wave2"></div>
    <div class="wave wave3"></div>
    <div class="wave wave4"></div>
</section>

<div class="container">
    <div class="row justify-content-between">
        <div class="col-lg-8 col-md-12 col-sm-12 col-12 col">
            <div class="content content-top shadow">
                <div class="row justify-content-between mx-auto">
                        <a class="d-inline tab {{ $siapa != 'me' ? 'tab-active' : ''}} mr-4" href="{{ route('pelukan.laporan', 'me') }}">
                            Semua
                        </a>
                        <a class="d-inline tab {{ $siapa == 'me' ? 'tab-active' : ''}}" href="{{ route('pelukan.laporan', 'me') }}">
                            Laporan Saya
                        </a>
                        <hr>
                        @foreach ($keluhan as $key => $value)
                            <p>{{ $value->user->nama }}</p>
                                    @if ($value->status == '0')
                                    <p class="text-danger">Pending</p>
                                    @elseif($value->status == 'proses')
                                    <p class="text-warning">{{ ucwords($value->status) }}</p>
                                    @else
                                    <p class="text-success">{{ ucwords($value->status) }}</p>
                                    @endif
                                </div> 
                                <div>
                                    <p>{{ $value->isi_keluhan }}</p>
                                </div>
                                <div>
                                    <p>{{ $value->tgl_keluhan->format('d M, h:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="laporan-mid">
                        <div class="judul-laporan">
                            {{ $value->judul_laporan }}
                        </div>
                        <p>{{ $value->isi_keluhan }}</p>
                    </div>
                    
                    <hr>

                </div>
           </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-12 col">
            <div class="content content-bottom shadow">
                <div>
                    <img src="{{ asset('images/user_default.svg') }}" alt="user profile" class="photo">
                    <div class="self-align">
                        <h5><a style="color: #6a70fc" href="#"></a></h5>
                        <p class="text-dark"></p>
                    </div>
                    <div class="row text-center">
                        <div class="col">
                            <p class="italic mb-0">Terverifikasi</p>
                            <div class="text-center">
                                {{ $hitung[0] }}
                            </div>
                        </div>
                        <div class="col">
                            <p class="italic mb-0">Proses</p>
                            <div class="text-center">
                                {{ $hitung[1] }}
                            </div>
                        </div>
                        <div class="col">
                            <p class="italic mb-0">Selesai</p>
                            <div class="text-center">
                                {{ $hitung[2] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</div>

{{-- Footer --}}
<footer style="background-color: green;">
    <div class="container"style="color: white;">
      <div class="row justify-content-around mt-3">
      <div class="col-md-4">
        <div class="card-body">
          <img src={{ asset("images/ptlokajayasm.png") }} alt="Laporkan" width="140px">
          <p class="card-text py-4">PT. LOKAJAYA SURYA MAHARDIKA memiliki kompetensi bisnis di bidang usaha Software Development, IT Learning Center, Telekomunikasi & Jaringan serta Web Design dan Multimedia. </p>
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
        <p class="card-text"><i class="fa fa-phone" aria-hidden="true"></i><strong>  Telp.</strong> <i>+62 877-7896-3999</i></p>
      </div>
      </div>
  
      <div class="col-md-4">
      <div class="card-body">
        <h5 class="card-title">Alamat</h5>
        <img src={{ asset("images/alamat.png") }} alt="login" class="card-img-top py-3" width="200px">
      </div>
      </div>
      </div>
      </div>
    </div>
</footer>
@endsection

@section('js')
@if (Session::has('pesan'))
<script>
    $('#loginModal').modal('show');

</script>
@endif
@endsection