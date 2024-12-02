@extends('layouts.admin')

@section('title', 'Form Tambah Kategori Layanan')

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
    <a href="{{ route('pelaporan.index') }}" class="text-white">Data Kategori Layanan >>></a>
    <a href="#" class="text-white">Form Tambah Kategori</a>
@endsection

@section('content')
    <div class="row"></div>
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header bg-success text-white">
                    Form Tambah Kategori Layanan
                </div>
                <div class="card-body">
                    <form action="{{ route('kategori.store') }}" method="POST">
                        @csrf
                        <div class="form-group text-success">
                            <label for="nama_layanan">Nama Layanan</label>
                            <input type="text" name="nama_layanan" id="nama_layanan" class="form-control" required>
                        </div>

                        <div class="form-group text-success">
                            <label for="id_petugas">ID Petugas</label>
                                <select name="id_petugas" id="id_petugas" class="custom-select">
                                    <option value="" selected disabled hidden>-- Pilih ID Petugas --</option>
                                        @foreach($petugas as $row)
                                          <option value="{{ $row->id_petugas }}">{{ $row->nama_petugas }}</option>
                                        @endforeach
                               </select>
                        </div>
                        
                        <button type="submit" class="btn btn-success" style="width: 100%">Simpan</button>
                    </form>
                </div>
            </div>
        </div>   
@endsection