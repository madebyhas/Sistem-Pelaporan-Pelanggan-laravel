@extends('layouts.admin')

@section('title', 'Halaman Dashboard')

@section('header', 'Dashboard')

@section('content')

<body>
  <div class="row my-3">
    <div class="col-lg-3">
      <div class="card text-center">
        <div class="card-header bg-success text-white">
          <h5>
            <i class="fa fa-user" aria-hidden="true"></i> Petugas
          </h5>
        </div>
        <div class="card-body">
          <div class="text-center">
            {{ $petugas }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="card text-center">
        <div class="card-header bg-success text-white">
          <h5>
            <i class="fa fa-server" aria-hidden="true"></i> Proyek
          </h5>
        </div>
        <div class="card-body">
          <div class="text-center">
            {{ $proyek }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="card text-center">
        <div class="card-header bg-success text-white">
          <h5>
            <i class="fa fa-users" aria-hidden="true"></i> Pelanggan
          </h5>
        </div>
        <div class="card-body">
          <div class="text-center">
            {{ $pelanggan }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="card text-center">
        <div class="card-header bg-success text-white">
          <h5>
            <i class="fa fa-file-text" aria-hidden="true"></i>
            Keluhan
          </h5>
        </div>
        <div class="card-body">
          <div class="text-center">
            {{ $keluhan }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <div class="row my-2">
    <div class="col-lg-12 mb-2 order-0">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-7">
            <div class="card-body">
              <h5 class="card-title text-success"> Selamat Datang, <strong>{{
                  Auth::guard('admin')->user()->nama_petugas
                  }}</strong>
              </h5>
              <p class="text-dark mb-4">Kamu memiliki <span class="badge badge-success">
                  {{ $keluhan }} </span> keluhan hari ini. Klik view keluhan dibawah ini untuk
                melihat.</p>

              <a href="{{ route('keluhan.index') }}" class="btn btn-sm btn-outline-success">
                <strong>
                  View Keluhan
                  &raquo;
                </strong>
              </a>
            </div>
          </div>
          <div class="col-sm-1 text-center text-sm-left">
            <div class="card-body pb-0 px-5 px-md-12">
              <img src="{{ asset('images/man.jpg') }}" height="160" alt="man">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <hr>
  @if(Auth::guard('admin')->user()->level == 'admin')
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="card">
        <div class="card-header d-block d-md-flex bg-success">
          <h5 class="text-white mb-0">Akses Cepat </h5>

        </div>
        <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="buttons">
          <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
            <button type="button" class="btn bg-white text-success px-0">
              <h5>
                <a href="{{ route('petugas.create') }}">
                <i class="fa fa-user" aria-hidden="true"></i> Add Petugas </a>
              </h5>
            </button>
          </div>
          <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
            <button type="button" class="btn bg-white text-success px-0">
              <h5>
                <a href="{{ route('proyek.create') }}">
                <i class="fa fa-server" aria-hidden="true"></i> Add Proyek </a>
              </h5>
            </button>
          </div>
          <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
            <button type="button" class="btn bg-white text-success px-0">
              <h5>
                <a href="{{ route('pelanggan.create') }}">
                <i class="fa fa-users" aria-hidden="true"></i> Add Pelanggan </a>
                <h5>
            </button>
          </div>
          <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
            <button type="button" class="btn bg-white text-success px-0">
              <h5>
                <a href="{{ route('laporan.index') }}">
                <i class="fa fa-file-text" aria-hidden="true"></i> Print Laporan </a>
              </h5>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div> 
  <hr>
  @else
  @endauth

  <div class="row my-3">
    <div class="col-lg-12">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-7">
            <div class="card-body">
              <h4 class="text-left text-success mb-4"><strong>Berikut ini adalah tata cara untuk menanggapi keluhan
                  :</strong></h4>
              <div class="text-dark mb-4">
                <ol>
                  <li class="text-left me-4">Pastikan keluhan didukung dengan dokumentasi keluhan</li>
                  <li class="text-left my-2">Tanggapi keluhan dengan mengubah status Proses dan memberikan tanggapan
                  </li>
                  <li class="text-left my-2">Informasikan keluhan kepada petugas</li>
                  <li class="text-left my-2">Konfirmasi keluhan telah selesai kepada pelanggan</li>
                  <li class="text-left my-2">Ubah status keluhan menjadi Selesai.</li>
                </ol>
              </div>
            </div>
          </div>
          <div class="col-sm-1 text-center text-sm-left">
            <div class="card-body pb-0 px-5 px-md-12">
              <img src="{{ asset('images/pelangga.png') }}" height="250" alt="man">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
@endsection