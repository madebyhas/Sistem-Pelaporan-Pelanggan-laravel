@extends('layouts.admin')

@section('title', 'Halaman Petugas')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@section('header', 'Data Petugas')

@section('content')
@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<a href="{{ route('petugas.create') }}" class="btn btn-purple mb-3"><i class="fa fa-user-plus" aria-hidden="true"></i>
    Tambah Petugas</a>
<table id="petugasTable" class="table bg-success">
    <thead class="text-white">
        <tr>
            <th>No</th>
            <th>Nama Petugas</th>
            <th>Username</th>
            <th>Telp</th>
            <th>Level</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody class="text-success bg-white">
        @foreach($petugas as $key => $value)
        <tr>
            <td>{{ $key += 1 }}</td>
            <td>{{ $value->nama_petugas }}</td>
            <td>{{ $value->username }}</td>
            <td>{{ $value->telp }}</td>
            <td>{{ $value->level }}</td>
            <td>
                <a href="{{ route('petugas.edit', $value->id_petugas) }}" class="badge badge-primary"><i
                        class="fa fa-eye" aria-hidden="true"></i> Detail</a>
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
            $('#petugasTable').DataTable();
        });
</script>
@endsection