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
                            <a class="nav-link text-white " href="/"><i class="fa fa-home" aria-hidden="true"></i>  HOME</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link text-white " href="#Respon"><i class="fa fa-book" aria-hidden="true"></i>  TANGGAPAN</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="text-center py-5">
        <h1 class="large text-white mt-3">Halaman Tanggapan</h1>
        <h3 class="medium text-white mt-3">Pelaporan Keluhan Layanan PT. Lokajaya Surya Mahardika</h3>
        <p class="italic text-white mb-5">Pelanggan Dapat Memonitoring Pelaporan Keluhan Layanan </p>
    </div>

    <div class="wave wave1"></div>
    <div class="wave wave2"></div>
    <div class="wave wave3"></div>
    <div class="wave wave4"></div>
</section>

{{-- Section Isi Laporan --}}
<div class="container">
    <div class="row justify-content-between">
        <div class="col-lg-8 col-md-12 col-sm-12 col-12 col">
            <div class="content content-top shadow">
                <a class="d-inline tab text-success {{ $siapa == 'me' ? 'tab-active' : ''}}" href="{{ route('pelukan.laporan', 'me') }}">
                    <Strong>Keluhan Saya</Strong>
                </a>
                <hr>
                <div class="card bg-white">
                    @foreach ($tanggapan as $key => $value)
                    <div class="col-lg-12">
                        <img src="{{ asset('images/userprofile.png') }}" alt="user profile" class="photo" style="color: green" >
                        <div class="self-align">
                            <h3><span class="badge badge-success">{{ Auth::guard('pelanggan')->user()->nama }}</span></h3>
                            <p><a class="text-dark">{{ Auth::guard('pelanggan')->user()->proyek->nama_proyek }}</a></p>
                            <p class="text-dark">Detail Keluhan :</p>
                        </div>
                        <div class="row text-left">
                            <div class="col">
                                <h6><a class="text-success">Isi Keluhan</a></h6>
                                <a class="text-center text-dark my-0">
                                    {{ $value->keluhan->isi_keluhan }}
                                </a>
                            </div>
                            <div class="col">
                                <h6><a class="text-success mb-0">Status</a></h6>
                                <div class="text-left text-dark">
                                    @if ($value->keluhan->status == '0')
                                    <p class="text-danger">Pending</p>
                                    @elseif($value->keluhan->status == 'proses')
                                    <p class="text-warning">{{ ucwords($value->keluhan->status) }}</p>
                                    @else
                                    <p class="text-success">{{ ucwords($value->keluhan->status) }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col">
                                <h6><a class="text-success">Tanggapan</a></h6>
                                <div class="text-left text-dark">
                                    {{ $value->tanggapan }}
                                </div>
                            </div>
                            <div class="col">
                                <h6><a class="text-success">Tgl Keluhan</a></h6>
                                <div class="text-left text-dark">
                                    {{ $value->keluhan->tgl_keluhan->format('d M, h:i') }}
                                </div>
                            </div>
                        </div><br>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
      
        <div class="col-lg-4 col-md-12 col-sm-12 col-12 col">
            <div class="content content-bottom shadow">
                <div>
                    <img src="{{ asset('images/userprofile.png') }}" alt="user profile" class="photo">
                    <div class="self-align">
                        <h3><span class="badge badge-success">{{ Auth::guard('pelanggan')->user()->nama }}</span></h3>
                        <p class="text-left">{{ Auth::guard('pelanggan')->user()->proyek->nama_instansi }}</p>
                    </div>
                    <div class="row text-left">
                        <div class="col my-2">
                            <p class="text-left mb-0">Nama Proyek :
                            <strong class="text-success">{{ Auth::guard('pelanggan')->user()->proyek->nama_proyek }}</strong> </p>
                        </div>
                        <div class="col my-2">
                            <p class="text-left mb-0">Email :
                            <strong class="text-success">{{ Auth::guard('pelanggan')->user()->email }}</strong> </p>
                        </div>
                        <div class="col my-2">
                            <p class="text-left mb-0">Telp :
                            <strong class="text-success">{{ Auth::guard('pelanggan')->user()->telp }}</strong> </p>
                        </div>
                        <div class="col my-2">
                            <p class="text-left mb-0">Alamat :
                            <strong class="text-success">{{ Auth::guard('pelanggan')->user()->proyek->alamat_instansi }}</strong> </p>
                        </div>
                    </div>
                        <hr>
                    <div class="row text-left">
                        <div class="col my-2">
                            <p class="text-left mb-0">Antrian</p>
                            <div class="text-success">
                                {{ $hitung[0] }}
                            </div>
                        </div>
                        <div class="col my-2">
                            <p class="text-left mb-0">Proses</p>
                            <div class="text-success">
                                {{ $hitung[1] }}
                            </div>
                        </div>
                        <div class="col my-2">
                            <p class="text-left mb-0">Selesai</p>
                            <div class="text-success">
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
