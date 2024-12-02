@extends('layouts.admin')

@section('title', 'Halaman Proyek')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>   

@section('header','Data Proyek')

@section('content')
@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<a href="{{ route('proyek.create') }}" class="btn btn-purple mb-3"><i class="fa fa-user-plus" aria-hidden="true"></i>  Tambah Proyek</a>
<div class="row">
    <div class="col-lg-12 col-12">
        <div class="card mb-2">
            <div class="card-header text-success bg-white"><i class="fa fa-bullhorn" aria-hidden="true"></i>
            <strong>
                Pastikan sebelum menghapus Data Proyek tidak ada Data Pelanggan yang berelasi dengan Data Proyek
            </strong>
            </div>
        </div>
    </div>
</div>    
    <table id="proyekTable" class="table bg-success">
        <thead class="text-white">
            <tr>
                <th>No</th>
                <th>ID Proyek</th>
                <th>Nama Instansi</th>
                <th>Nama Proyek</th>
                <th>Jangka Waktu Awal</th>
                <th>Jangka Waktu Akhir</th>
                <th>Garansi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="text-success">
            @foreach($proyek as $key => $value)
                <tr>
                    <td>{{ $key += 1 }}</td>
                    <td>{{ $value->id_proyek }}</td>
                    <td>{{ $value->pelanggan->nama_instansi }}</td>
                    <td>{{ $value->nama_proyek }}</td>
                    <td>{{ $value->jangka_waktu_awal }}</td>
                    <td>{{ $value->jangka_waktu_akhir }}</td>
                    <td>
                        @if($value->garansi == 'expired')
                        <a href="#" class="badge badge-danger">Expired</a>
                        @else
                        <a href="#" class="badge badge-success">Available</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('proyek.edit', $value->id_proyek) }}" class="badge badge-primary"><i class="fa fa-eye" aria-hidden="true"></i> Lihat</a>
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
            $('#proyekTable').DataTable();
        });
    </script>
@endsection