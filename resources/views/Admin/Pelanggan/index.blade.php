@extends('layouts.admin')

@section('title', 'Halaman Pelanggan')


@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>   

@section('header','Data Pelanggan')    

@section('content')
@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<a href="{{ route('pelanggan.create') }}" class="btn btn-purple mb-3"><i class="fa fa-user-plus" aria-hidden="true"></i>  Tambah Pelanggan</a>
<div class="row">
    <div class="col-lg-12 col-12">
        <div class="card mb-2">
            <div class="card-header text-success bg-white"><i class="fa fa-bullhorn" aria-hidden="true"></i>
            <strong>
                Pastikan sebelum menghapus Data Pelangan tidak ada Data Proyek yang berelasi dengan Data Pelanggan
            </strong>
            </div>
        </div>
    </div>
</div>    
    <table id="pelangganTable" class="table bg-success">
        <thead class="text-white">
            <tr>
                <th>No</th>
                <th>ID Pelanggan</th>
                <th>Nama</th>
                <th>Nama Instansi</th>
                <th>Alamat Instansi</th>
                <th>Provinsi</th>
                <th>Email</th>
                <th>Username</th>
                <th>Telp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="text-success">
            @foreach($pelanggan as $key => $value)
                <tr>
                    <td>{{ $key += 1 }}</td>
                    <td>{{ $value->id_pelanggan }}</td>
                    <td>{{ $value->nama}}</td>
                    <td>{{ $value->nama_instansi }}</td> 
                    <td>{{ $value->alamat_instansi }}</td> 
                    <td>{{ $value->provinsi }}</td> 
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->username }}</td>
                    <td>{{ $value->telp }}</td>
                    <td>
                        <a href="{{ route('pelanggan.edit', $value->id_pelanggan) }}"class="badge badge-primary"><i class="fa fa-eye" aria-hidden="true"></i>  Detail</a>
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
            $('#pelangganTable').DataTable();
        });
    </script>
@endsection