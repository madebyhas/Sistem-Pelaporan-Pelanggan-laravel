@extends('user.layout.userr')

@section('title', 'Halaman Pelaporan')


@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>   

@section('header','Data Pelaporan')    

@section('content')
@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
@if (session('belum'))
<div class="alert alert-danger">{{ session('belum') }}</div>
@endif
<a href="{{ route('pelaporan.create') }}" class="btn btn-purple mb-3"><i class="fa fa-file-text" aria-hidden="true"></i>  Lapor Keluhan !</a>
    <table id="pelaporanTable" class="table bg-success">
        <thead class="text-white">
            <tr>
                <th>No</th>
                <th>Nama Proyek</th>
                <th>Nama Instansi</th>
                <th>Tanggal</th>
                <th>Isi Pelaporan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="text-success">
            @foreach($keluhan as $key => $value)
            <tr>
                <td>{{ $key += 1 }}</td>
                <td>{{ $value->proyek->nama_proyek }}</td>
                <td>{{ $value->proyek->pelanggan->nama_instansi }}</td>
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
                <td>
                    <a href="{{ route('pelaporan.edit', $value->id_keluhan) }}" class="badge badge-primary"><i class="fa fa-eye" aria-hidden="true"></i>  Detail Keluhan</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#pelaporanTable').DataTable();
        });
    </script>
@endsection