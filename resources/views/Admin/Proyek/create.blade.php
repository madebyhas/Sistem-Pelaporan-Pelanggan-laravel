@extends('layouts.admin')

@section('title', 'Form Tambah Proyek')

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
    <a href="{{ route('proyek.index') }}" class="text-white">Data Proyek >>></a>
    <a href="#" class="text-white">Form Tambah Proyek</a>
@endsection

@section('content')
    <div class="row"></div>
        <div class="col-lg">
            <div class="card card-center">
                <div class="card-header bg-success text-white">
                    Form Tambah Proyek
                </div>
                <div class="card-body">
                    @if (session('pesan'))
                    <div class="alert alert-danger">{{ session('pesan') }}</div>
                    @endif
                    <form action="{{ route('proyek.store') }}" method="POST">
                        @csrf
                        <div class="form-group text-success">
                            <label for="id_pelanggan">ID Pelanggan</label>
                                <select name="id_pelanggan" id="id_pelanggan" class="custom-select text-success">
                                    <option value="" selected disabled hidden>-- Pilih Nama Instansi --</option>
                                        @foreach($pelanggan as $row)
                                          <option value="{{ $row->id_pelanggan }}">{{ $row->nama_instansi }}</option>
                                        @endforeach
                               </select>
                        </div>
                        <div class="form-group text-success">
                            <label for="nama_proyek">Nama Proyek</label>
                            <input type="text" name="nama_proyek" id="nama_proyek" class="form-control" required>
                        </div>
                        <div class="form-group text-success">
                            <label for="jangka_waktu_awal">Jangka Waktu Mulai</label>
                            <input type="jangka_waktu_awal" name="jangka_waktu_awal" class="form-control" onfocusin="(this.type='date')" onfocusout="
                            (this.type='text')">
                        </div>
                        <div class="form-group text-success">
                            <label for="jangka_waktu_akhir">Jangka Waktu Akhir</label>
                            <input type="jangka_waktu_akhir" name="jangka_waktu_akhir" class="form-control" onfocusin="(this.type='date')" onfocusout="
                            (this.type='text')">
                        </div>

                        <div class="form-group text-success">
                            <label for="garansi">Garansi</label>
                            <div class="input-group">
                                <select name="garansi" id="garansi" class="custom-select text-success">
                                    <option value="0" selected>Pilih Garansi (Default Available)</option>
                                    <option value="expired">Expired</option>
                                    <option value="0">Available</option>
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