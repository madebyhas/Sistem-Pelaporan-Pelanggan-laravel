@extends('layouts.admin')

@section('tittle', 'Detail Pelanggan')

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
        .btn-purple {
            background: #6a70fc;
            border: 1px solid #6a70fc;
            color: #fff;
            width: 100%;
        }
    </style>
@endsection

@section('header')
    <a href="{{ route('pelanggan.index') }}" class="text-white">Data Pelanggan >>></a>
    <a href="#" class="text-white">Detail Pelanggan</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <div class="text-center">
                        Detail Pelanggan
                    </div>
                </div>
                <div class="card-body">
                    <table class="table text-success">
                        <tbody>
                            <tr>
                                <th>id_pelanggan</th>
                                <td>:</td>
                                <td>{{ $pelanggan->id_pelanggan }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>:</td>
                                <td>{{ $pelanggan->nama }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>:</td>
                                <td>{{ $pelanggan->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>:</td>
                                <td>{{ $pelanggan->username }}</td>
                            </tr>
                            <tr>
                                <th>No Telp</th>
                                <td>:</td>
                                <td>{{ $pelanggan->telp }}</td>
                            </tr>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection