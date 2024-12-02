@extends('layouts.admin')

@section('title', 'Halaman Laporan')

@section('header','Cetak Laporan Keluhan')

@section('content')
<div class="row">
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header text-success bg-white"><i class="fa fa-bullhorn">
                
                   Mohon Isi Sesuai Jumlah Pesanan Yang Dipesan Setiap Kebutuhan Yang Dibutuhkan! 
                </i>
            </div>
        </div>
    </div>
</div>

<div class="row my-4">
    <div class="col-lg-4 col-12">
        <div class="card">
            <div class="card-header text-white bg-success">
                Cari Berdasarkan Tanggal
            </div>
            <div class="card-body">
                <form action="{{ route('laporan.getLaporan') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="from" class="form-control" placeholder="Tanggal Awal"
                            onfocusin="(this.type='date')" onfocusout="
                        (this.type='text')">
                    </div>
                    <div class="form-group">
                        <input type="text" name="to" class="form-control" placeholder="Tanggal Akhir"
                            onfocusin="(this.type='date')" onfocusout="
                        (this.type='text')">
                    </div>
                    <button type="submit" class="btn btn-purple" style="width: 100%">Cari Laporan</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-12">
        <div class="card">
            <div class="card-header text-white bg-success">
                Data Berdasarkan Tanggal
                <div class="float-right">
                    @if($keluhan ?? '')
                    <a href="{{ route('laporan.cetakLaporan', ['from' => $from, 'to' => $to]) }}"
                        class="btn btn-danger"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Unduh PDF</a>
                    @endif
                </div>
            </div>
            <div class="card-body">
                @if($keluhan ?? '')
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Isi Keluhan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($keluhan as $key => $value)
                        <tr>
                            <td>{{ $key += 1 }}</td>
                            <td>{{ $value->tgl_keluhan->format('d-M-Y') }}</td>
                            <td>{{ $value->isi_keluhan }}</td>
                            <td>
                                @if($value->status == '0')
                                <a href="#" class="badge badge-danger">Pending</a>
                                @elseif($value->status == 'proses')
                                <a href="#" class="badge badge-warning text-white">Proses</a>
                                @else
                                <a href="#" class="badge badge-success">Selesai</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="text-center">
                    Tidak Ada Data
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection