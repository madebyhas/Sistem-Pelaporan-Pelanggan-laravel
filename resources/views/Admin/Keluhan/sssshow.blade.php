@extends('layouts.admin')

@section('title', 'Respon Keluhan')

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
    <a href="{{ route('keluhan.index') }}" class="text-white">Data Keluhan >>></a>
    <a href="#" class="text-white">Form Respon Keluhan</a>
@endsection

@section('content')
    <div class="row"></div>
            <div class="card">
                <div class="card-header bg-success text-white">
                    Form Respon Keluhan
                </div>
                <div class="card-body">
                    <form action="{{ route('keluhan.update', $keluhan->id_keluhan) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group text-success ">
                            <tbody>
                                <tr>
                                    <th>ID Keluhan</th>
                                    <td>:</td>
                                    <td>{{ $keluhan->id_keluhan }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Laporan</th>
                                    <td>:</td>
                                    <td>{{ $keluhan->tgl_keluhan }}</td>
                                </tr>
                                <tr>
                                    <th>Foto</th>
                                    <td>:</td>
                                    <td><img src="{{ Storage::url($keluhan->foto) }}" alt="Foto Laporan" class="embed-responsive"></td>
                                </tr>
                                <tr>
                                    <th>Isi Laporan</th>
                                    <td>:</td>
                                    <td>{{ $keluhan->isi_keluhan }}</td>
                                </tr> 
                            </tbody>  
                        </div>
                        <div class="form-group text-success">
                            <label for="level">Level</label>
                            <div class="input-group mb-3">
                                <select name="level" id="level" class="custom-select">
                                    @if($keluhan->level == 'admin')
                                    <option selected  value="admin">Admin</option>
                                    <option value="keluhan">keluhan</option>
                                    @else
                                    <option value="admin">Admin</option>
                                    <option selected value="keluhan">keluhan</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-center btn-success text-white" style="width: 40%">Update</button>
                    </form>
                    <form action="{{ route('keluhan.destroy', $keluhan->id_keluhan) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mt-2" style="width: 40%">Hapus</button>
                    </form>
                </div>
        </div>
@endsection