@extends('layouts.user')

@section('css')
<style>
    body {
        background: green;
    }

    .btn-purple {
        background: green;
        width: 100%;
        color: #fff;
    }

</style>
@endsection

@section('title', 'Halaman Daftar')

@section('content')
<div class="container">
    <div class="card o-hidden border-0 shadow-dark my-3">
        <div class="card-body p-0">
          <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
              <div class="p-5">
                <div class="text-center">
                    <img src="images/logolokajayasm.png"  alt="lokajaya" width="200px">  
                    <hr>  
                    <h1 class="h4 text-success py-1"><strong>Form Pendaftaran</strong></h1>
                </div>
                <hr>
                <form action="{{ route('pelukan.register') }}" method="POST" class="user">
                  @csrf
                  <div class="form-group py-1">
                    <input name="nama" type="text" class="form-control form-control-user @error('nama')is-invalid @enderror"
                    id="exampleInputName" placeholder="Nama" >
                    @error('nama')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group py-1">
                    <input name="alamat" type="text" class="form-control form-control-user @error('alamat')is-invalid @enderror"
                    id="exampleInputName" placeholder="Alamat" >
                    @error('alamat')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group py-1">
                    <input name="telp" type="text" class="form-control form-control-user @error('telp')is-invalid @enderror"
                    id="exampleInputName" placeholder="No. Telp" >
                    @error('telp')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group py-1">
                    <input name="username" type="text" class="form-control form-control-user @error('usernama')is-invalid @enderror"
                    id="exampleInputName" placeholder="Username" >
                    @error('username')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group py-1">
                    <input name="email" type="email" class="form-control form-control-user @error('email')is-invalid @enderror" id="exampleInputEmail" placeholder="Email">
                    @error('email')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group py-1">
                      <input name="password" type="password" class="form-control form-control-user @error('password')is-invalid @enderror" id="exampleInputPassword" placeholder="Password">
                      @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                  </div>
                  <hr>
                  <button type="submit" class="btn btn-success btn-user mt-3" style="width: 100%">Kirim</button>
                  <a href="/" class="btn btn-warning text-white mt-3" style="width: 100%">Kembali ke Halaman Utama</a>
                </form>
              </div>
            </div>
            @if (Session::has('pesan'))
            <div class="alert alert-danger mt-2">
                {{ Session::get('pesan') }}
            </div>
            @endif
        </div>
        </div>
    </div>
  </div>
  

</div>
@endsection
