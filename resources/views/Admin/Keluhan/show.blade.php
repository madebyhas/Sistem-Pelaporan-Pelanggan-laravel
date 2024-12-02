@extends('layouts.admin')

@section('title', 'Detail Pelaporan')

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
    <a href="{{ route('keluhan.index') }}" class="text-white">Data Pelaporan >>></a>
    <a href="#" class="text-white">Detail Pelaporan</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header bg-success">
                    <div class="text-center text-white">
                        Pelaporan Keluhan Layanan
                    </div>
                </div>
                <div class="card-body">
                    <table class="table text-success">
                        <tbody>
                            <tr>
                                <th>ID Keluhan</th>
                                <td>:</td>
                                <td>{{ $keluhan->id_keluhan }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Laporan</th>
                                <td>:</td>
                                <td>{{ $keluhan->tgl_keluhan->format('d-F-Y') }}</td>
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
                            <tr>
                                <th>Status</th>
                                <td>:</td> 
                                <td>
                                    @if($keluhan->status == '0')
                                        <a href="#" class="badge badge-danger">Pending</a>
                                    @elseif($keluhan->status == 'proses')
                                        <a href="#" class="badge badge-warning text-white">Proses</a>
                                    @else
                                        <a href="#" class="badge badge-success">Selesai</a>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-12">
        <div class="card bg-success">
            <div class="text-center text-white">
                Respon Petugas
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('penindakan.createOrUpdate') }}" method="POST">
                @csrf
                <input type="hidden" name="id_keluhan" value="{{ $keluhan->id_keluhan }}">
                <div class="form-group text-success">
                    <label for="status">Status</label>
                    <div class="input-group mb-3">
                        <select name="status" id="status" class="custom-select text-success">
                            @if($keluhan->status == '0')
                                <option selected value="0">Pending</option>
                                <option value="proses">Proses</option>
                                <option value="selesai">Selesai</option>
                            @elseif($keluhan->status == "proses")
                                <option value="0">Pending</option>
                                <option selected value="proses">Proses</option>
                                <option value="selesai">Selesai</option>
                            @else
                                <option value="0">Pending</option>
                                <option value="proses">Proses</option>
                                <option selected value="selesai">Selesai</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group text-success">
                    <label for="tanggapan">Tanggapan</label>
                    <textarea name="tanggapan" id="tanggapan" rows="4" class="form-control"  placeholder="Belum ada penindakan" required>{{ $penindakan->tanggapan ?? '' }}</textarea>
                </div>  
                <button type="submit" class="btn btn-purple">Kirim</button>
            </form>
            <div>
            <a href= "{{ route('keluhan.index') }}" class="btn btn-warning text-dark my-3" style="width: 100%">Kembali</a>
            </div>



            @if(Session::has('status'))
                <div class="alert alert-success mt-2">
                    {{ Session::get('status') }}
                </div>
            @endif
            </div>
        </div>
    </div>
</div>
@endsection