@extends('user.layout.userr')

@section('title', 'Halaman Dashboard')

@section('header', 'Dashboard')

@section('content')

<body>
  <hr>
  <div class="row my-2">
    <div class="col-lg-12 mb-2 order-0">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-7">
            <div class="card-body">
              <h5 class="card-title text-success"> Selamat Datang, <strong>
                  {{ Auth::guard('pelanggan')->user()->nama }}
                </strong>
              </h5>
              <p class="text-dark mb-4">Kamu memiliki keluhan hari ini?
                Klik tombol keluhan dibawah ini untuk
                melaporkan keluhanmu <strong>
                  {{ Auth::guard('pelanggan')->user()->nama }}
                </strong>.</p>

              <a href="{{ route('pelaporan.create') }}" class="btn btn-sm btn-outline-success">
                <strong>
                  Lapor Keluhan
                  &raquo;
                </strong>
              </a>
            </div>
          </div>
          <div class="col-sm-1 text-center text-sm-left">
            <div class="card-body pb-0 px-5 px-md-12">
              <img src="{{ asset('images/man.jpg') }}" height="160" alt="man">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <hr>
  <div class="col-lg-12 col-12">
  <div class="card">
    <div class="card-header bg-success">
      <div class="text-start text-white">
        <h4> Pelaporan Keluhan</h4>
        <div class="float-right">
          @if($penindakan)
          <a href="{{ route('Pelaporan.cetakLaporan' ) }}"
              class="btn btn-danger"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Unduh PDF</a>
          @endif
      </div>
      </div>
    </div>
    <div class="card-body">
      @if($penindakan)
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Proyek</th>
            <th>Nama Instansi</th>
            <th>Tanggal</th>
            <th>Isi Keluhan</th>
            <th>Nama Petugas</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach($penindakan as $key => $value)
          <tr>
            <td>{{ $key += 1 }}</td>
                <td>{{ $value->keluhan->proyek->nama_proyek }}</td>
                <td>{{ $value->keluhan->proyek->pelanggan->nama_instansi }}</td>
                <td>{{ $value->keluhan->tgl_keluhan->format('d-M-Y') }}</td>
                <td>{{ $value->keluhan->isi_keluhan }}</td>
                <td>{{ $value->petugas->nama_petugas }}</td>
            <td>
              @if($value->keluhan->status == '0')
              <a href="#" class="badge badge-danger">Pending</a>
              @elseif($value->keluhan->status == 'proses')
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

  <hr>

  <div class="row my-3">
    <div class="col-lg-12 col-12">
      <div class="card">
        <div class="card-header bg-success">
          <div class="text-center text-white">
            <h4> Detail Identitas Pelanggan </h4>
          </div>
        </div>
        <div class="card-body">
          <table class="table text-success">
            <tbody>
              <tr>
                <th>Nama Pelanggan</th>
                <th>:</th>
                <td>{{ Auth::guard('pelanggan')->user()->nama }}</td>
              </tr>
              <tr>
                <th>Nama Instansi</th>
                <th>:</th>
                <td>{{ Auth::guard('pelanggan')->user()->nama_instansi }}</td>
              </tr>
              <tr>
                <th>Alamat Instansi</th>
                <th>:</th>
                <td>{{ Auth::guard('pelanggan')->user()->alamat_instansi }}</td>
              </tr>
              <tr>
                <th>Email</th>
                <th>:</th>
                <td>{{ Auth::guard('pelanggan')->user()->email }}</td>
              </tr>
              <tr>
                <th>No telp</th>
                <th>:</th>
                <td>{{ Auth::guard('pelanggan')->user()->telp }}</td>
              </tr>
              <tr>
                <th>Username</th>
                <th>:</th>
                <td>{{ Auth::guard('pelanggan')->user()->username }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
</body>
@endsection