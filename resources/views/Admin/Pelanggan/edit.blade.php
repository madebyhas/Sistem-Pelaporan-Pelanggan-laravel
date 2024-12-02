@extends('layouts.admin')

@section('title', 'Form Edit Pelanggan')

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
<a href="#" class="text-white">Form Edit Pelanggan</a>
@endsection

@section('content')
<div class="row"></div>
<div class="card">
    <div class="card-header bg-success text-white">
        Form Tambah Pelanggan
    </div>
    <div class="card-body">
        <form action="{{ route('pelanggan.update', $pelanggan->id_pelanggan) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group text-success ">
                <label for="nama">Nama Pelanggan</label>
                <input type="text" value="{{ $pelanggan->nama }}" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="form-group text-success ">
                <label for="nama_instansi">Nama Instansi</label>
                <input type="text" value="{{ $pelanggan->nama_instansi }}" name="nama_instansi" id="nama_instansi"
                    class="form-control" required>
            </div>
            <div class="form-group text-success ">
                <label for="alamat_instansi">Alamat Instansi</label>
                <input type="text" value="{{ $pelanggan->alamat_instansi }}" name="alamat_instansi" id="alamat_instansi"
                    class="form-control" required>
            </div>
            <div class="form-group text-success ">
                <label for="email">Email</label>
                <input type="text" value="{{ $pelanggan->email }}" name="email" id="email" class="form-control"
                    required>
            </div>
            <div class="form-group text-success">
                <label for="telp">No Telp</label>
                <input type="number" value="{{ $pelanggan->telp }}" name="telp" id="telp" class="form-control" required>
            </div>
            <div class="form-group text-success">
                <label for="username">Username</label>
                <input type="text" value="{{ $pelanggan->username }}" name="username" id="username" class="form-control"
                    required>
            </div>
            <div class="form-group text-success">
                <label for="password">Password</label>
                <input type="text" name="password" id="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-center btn-success text-white" style="width: 40%">Update</button>
        </form>
        <form action="{{ route('pelanggan.destroy', $pelanggan->id_pelanggan) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-2" style="width: 40%">Hapus</button>
        </form>
        <div>
            <a href="{{ route('pelanggan.index') }}" class="btn btn-warning text-dark my-3"
                style="width: 40%">Kembali</a>
        </div>
    </div>
</div>
@endsection