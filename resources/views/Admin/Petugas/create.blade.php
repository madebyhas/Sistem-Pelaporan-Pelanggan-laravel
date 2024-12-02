@extends('layouts.admin')

@section('title', 'Form Tambah Petugas')

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
<a href="{{ route('petugas.index') }}" class="text-white">Data Petugas >>></a>
<a href="#" class="text-white">Form Tambah Petugas</a>
@endsection

@section('content')
<div class="row"></div>
<div class="col-lg">
    <div class="card card-center">
        <div class="card-header bg-success text-white">
            Form Tambah Petugas
        </div>
        <div class="card-body">
            @if (session('pesan'))
            <div class="alert alert-danger">{{ session('pesan') }}</div>
            @endif
            <form action="{{ route('petugas.store') }}" method="POST">
                @csrf
                <div class="form-group text-success">
                    <label for="nama_petugas">Nama Petugas</label>
                    <input type="text" name="nama_petugas" id="nama_petugas" value="{{ old('nama_petugas') }}"
                        class="form-control" required>
                </div>
                <div class="form-group text-success">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="{{ old('username') }}" class="form-control"
                        required>
                </div>
                <div class="form-group text-success">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group text-success">
                    <label for="telp">No Telp</label>
                    <input type="number" name="telp" id="telp" value="{{ old('telp') }}" class="form-control" required>
                </div>
                <div class="form-group text-success">
                    <label for="level">Level</label>
                    <div class="input-group mb-3">
                        <select name="level" id="level" class="custom-select text-success">
                            <option value="petugas" selected>Pilih level (Default Petugas)</option>
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                        </select>
                    </div>
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