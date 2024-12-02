@extends('user.layout.userr')

@section('title', 'Form Lapor Keluhan')

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
<a href="{{ route('pelaporan.index') }}" class="text-white">Halaman Keluhan >> </a>
<a href="#" class="text-white">Form Keluhan</a>
@endsection

@section('content')
<div class="row"></div>
<div class="col-lg">
    <div class="card card-center">
        <div class="card-header bg-success text-white">
           <h4> Form Keluhan </h4>
        </div>
        <div class="card-body">
            @if (session('erorr'))
            <div class="alert alert-danger">{{ session('erorr') }}</div>
            @endif
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('pelaporan.update', $keluhan->id_keluhan) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group text-success">
                    <label for="id_proyek">Nama Proyek</label>
                    <select name="id_proyek" id="id_proyek" class="custom-select text-success">
                        <option value="" selected disabled hidden>-- Pilih Nama Proyek --</option>
                        @foreach($proyek as $row)
                        <option value="{{ $row->id_proyek }}">{{ $row->nama_proyek }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group text-success">
                    <label for="isi_keluhan">Tuliskan Keluhan Anda Disini !</label>
                    <textarea name="isi_keluhan" placeholder="Masukkan Isi Laporan" class="form-control text-success"
                        rows="4">{{ old('isi_keluhan') }}</textarea>
                </div>
                <div class="form-group text-success">
                    <label for="isi_keluhan">Unggah Dokumentasi Keluhan Anda !</label>
                    <input type="file" name="foto" class="form-control">
                </div>
                <button type="submit" class="btn btn-success" style="width: 100%">Simpan</button>
            </form>
            <form action="{{ route('Pelaporan.destroy', $keluhan->id_keluhan) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mt-2" style="width: 40%">Hapus</button>
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