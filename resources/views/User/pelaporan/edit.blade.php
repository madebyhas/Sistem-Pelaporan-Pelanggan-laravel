@extends('user.layout.userr')

@section('title', 'Detail Keluhan')

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
<a href="{{ route('pelaporan.index') }}" class="text-white">Data Keluhan >>></a>
<a href="#" class="text-white">Form Detail Keluhan</a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header bg-success">
                <div class="text-center text-white">
                    Pelaporan Keluhan Layanan
                </div>
            </div>
            <div class="card-body">
                <table class="table text-success">
                    <tbody>
                        @foreach($penindakan as $k => $v)
                        @if($loop->index < 1)
                        <tr>
                            <th>ID Keluhan</th>
                            <td>:</td>
                            <td>{{ $penindakan->keluhan->id_keluhan }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Laporan</th>
                            <td>:</td>
                            <td>{{ $penindakan->keluhan->tgl_keluhan->format('d-M-Y') }}</td>
                        </tr>
                        <tr>
                            <th>Foto</th>
                            <td>:</td>
                            <td><img src="{{ Storage::url($penindakan->keluhan->foto) }}" alt="Foto Laporan"
                                    class="embed-responsive" width="50%"></td>
                        </tr>
                        <tr>
                            <th>Isi Laporan</th>
                            <td>:</td>
                            <td>{{ $penindakan->keluhan->isi_keluhan }}</td>
                        </tr>
                        <tr>
                            <th>Tanggapan</th>
                            <td>:</td>
                            <td>{{ $penindakan->tanggapan }}</td>
                        </tr>
                        <tr>
                            <th>Nama Petugas</th>
                            <td>:</td>
                            <td>{{ $penindakan->petugas->nama_petugas }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>:</td>
                            <td>
                                @if($penindakan->keluhan->status == '0')
                                <a href="#" class="badge badge-danger">Pending</a>
                                @elseif($penindakan->keluhan->status == 'proses')
                                <a href="#" class="badge badge-warning text-white">Proses</a>
                                @else
                                <a href="#" class="badge badge-success">Selesai</a>
                                @endif
                            </td>
                        </tr>
                        @endif
                    </tbody>
                    @endforeach

                </table>
                    <a href="{{ route('pelaporan.index') }}" class="btn btn-success mt-2" style="width: 40%"> Kembali</a>
            </div>
        </div>
    </div>
</div>

@endsection