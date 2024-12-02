@extends('layouts.admin')

@section('title', 'Form Tambah Pelanggan')

@section('css')
    <style>
        .text-primary:hover {
            text-decoration: underline;
        }
        .text-grey {
            color: #6c757d;
        }
        .text-primary:hover {
            color: #6c757d;
        }
    </style>

@endsection

@section('header')
    <a href="{{ route('pelanggan.index') }}" class="text-white">Data Pelanggan >>></a>
    <a href="#" class="text-white">Form Tambah Pelanggan</a>
@endsection

@section('content')
    <div class="row"></div>
        <div class="col-lg">
            <div class="card card-center">
                <div class="card-header bg-success text-white">
                    Form Tambah Pelanggan
                </div>
                <div class="card-body">
                    @if (session('pesan'))
                    <div class="alert alert-danger">{{ session('pesan') }}</div>
                    @endif
                    <form action="{{ route('pelanggan.store') }}" method="POST">
                        @csrf
                        <div class="form-group text-success">
                            <label for="nama">Nama Pelanggan</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div class="form-group text-success">
                            <label for="nama_innstansi">Nama Instansi</label>
                            <input type="text" name="nama_instansi" id="nama_instansi" class="form-control" required>
                        </div>
                        <div class="form-group text-success">
                            <label for="alamat_instansi">Alamat Instansi</label>
                            <input type="text" name="alamat_instansi" id="alamat_instansi" class="form-control" required>
                        </div>
                        <div class="form-group text-success">
                            <label for="provinsi">Provinsi</label>
                            <input type="text" name="provinsi" id="provinsi" class="form-control" required>
                        </div>
                        <div class="form-group text-success">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group text-success">
                            <label for="telp">No Telp</label>
                            <input type="number" name="telp" id="telp" class="form-control" required>
                        </div>
                        <div class="form-group text-success">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>
                        <div class="form-group text-success">
                            <label for="password">Password</label>
                            <input type="text" name="password" id="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success" style="width: 100%">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    <div class="col-lg-6 col-12">
        @if(Session::has('username'))
            <div class="alert alert-danger">
                {{ Session::get('username') }}
            </div>            
        @endif
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
        </div>
    </div>    
@endsection