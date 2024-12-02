@extends('layouts.admin')

@section('title', 'Halaman Kategori Layanan')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

@section('header', 'Data Kategori Layanan')

@section('content')
<a href="{{ route('kategori.create') }}" class="btn btn-purple mb-3">Tambah kategori Layanan</a>
    <table id="kategorilayananTable" class="table bg-success">
        <thead class="text-white">
            <tr>
                <th>No</th>
                <th>ID Kategori</th>
                <th>Nama Layanan</th>
                <th>ID Petugas</th>
                <th>Nama Petugas</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody class="text-success">
            @foreach($kategori as $key => $value)
            <tr>
                <td>{{ $key += 1 }}</td>
                <td>{{ $value->id_kategori }}</td>
                <td>{{ $value->nama_layanan }}</td>
                <td>{{ $value->id_petugas }}</td>
                <td>{{ $value->petugas->nama_petugas }}</td>
                <td><a href="{{ route('kategori.edit', $value->id_kategori) }}" style="text-decoration: underline">Lihat</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script style="color: green">
        $(document).ready(function () {
            $('#kategorilayananTable').DataTable();
        });
    </script>
@endsection