@extends('layouts.admin')

@section('title', 'Form Edit Proyek')

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
    <a href="#" class="text-white">Form Edit Proyek</a>
@endsection

@section('content')
    <div class="row"></div>
            <div class="card">
                <div class="card-header bg-success text-white">
                    Form Tambah Proyek
                </div>
                <div class="card-body">
                    <form action="{{ route('proyek.update', $proyek->id_proyek) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group text-success">
                            <label for="id_pelanggan">ID Pelanggan</label>
                                <select name="id_pelanggan" id="id_pelanggan" class="custom-select text-success">
                                    <option value="" selected disabled hidden>-- Pilih Nama Proyek --</option>
                                        @foreach($pelanggan as $row)
                                          <option value="{{ $row->id_pelanggan }}">{{ $row->nama_instansi }}</option>
                                        @endforeach
                               </select>
                        </div>
                        <div class="form-group text-success">
                            <label for="nama_proyek">Nama Proyek</label>
                            <input type="text" value="{{ $proyek->nama_proyek }}" name="nama_proyek" id="nama_proyek" class="form-control" required>
                        </div>
                        <div class="form-group text-success">
                            <label for="jangka_waktu">jangka Waktu</label>
                            <input type="jangka_waktu" value="{{ $proyek->jangka_waktu }}" name="jangka_waktu" class="form-control" onfocusin="(this.type='date')" onfocusout="
                            (this.type='text')">
                        </div>

                        <div class="form-group text-success">
                            <label for="garansi">Garansi</label>
                            <div class="input-group">
                                <select name="garansi" value="{{ $proyek->nama_proyek }}" id="garansi" class="custom-select text-success">
                                    <option value="0" selected>Pilih Garansi (Default Available)</option>
                                    <option value="expired">Expired</option>
                                    <option value="0">Available</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-center btn-success text-white" style="width: 40%">Update</button>
                    </form>
                    <form action="{{ route('proyek.destroy', $proyek->id_proyek) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mt-2" style="width: 40%">Hapus</button>
                    </form>
                    <div>
                        <a href= "{{ route('proyek.index') }}" class="btn btn-warning text-dark my-3" style="width: 40%">Kembali</a>
                    </div>
                </div>
        </div>
@endsection