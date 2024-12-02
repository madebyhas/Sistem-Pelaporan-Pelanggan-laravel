<div class="container">
    <div class="row justify-content-between">
        <div class="col-lg-8 col-md-12 col-sm-12 col-12 col">
            <div class="content content-top shadow">
                <a class="d-inline tab text-success {{ $siapa == 'me' ? 'tab-active' : ''}}" href="{{ route('pelukan.laporan', 'me') }}">
                    <Strong>Keluhan Saya</Strong>
                </a>
                <hr>
                <div class="card bg-white">
                    @foreach ($tanggapan as $key => $value)
                    <div class="col-lg-12">
                        <img src="{{ asset('images/userprofile.png') }}" alt="user profile" class="photo" style="color: green" >
                        <div class="self-align">
                            <h3><span class="badge badge-success">{{ Auth::guard('pelanggan')->user()->nama }}</span></h3>
                            <p><a class="text-dark">{{ Auth::guard('pelanggan')->user()->proyek->nama_proyek }}</a></p>
                            <p class="text-dark">Detail Keluhan :</p>
                        </div>
                        <div class="row text-left">
                            <div class="col">
                                <h6><a class="text-success">Isi Keluhan</a></h6>
                                <a class="text-center text-dark my-0">
                                    {{ $value->keluhan->isi_keluhan }}
                                </a>
                            </div>
                            <div class="col">
                                <h6><a class="text-success mb-0">Status</a></h6>
                                <div class="text-left text-dark">
                                    @if ($value->keluhan->status == '0')
                                    <p class="text-danger">Pending</p>
                                    @elseif($value->keluhan->status == 'proses')
                                    <p class="text-warning">{{ ucwords($value->keluhan->status) }}</p>
                                    @else
                                    <p class="text-success">{{ ucwords($value->keluhan->status) }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col">
                                <h6><a class="text-success">Tanggapan</a></h6>
                                <div class="text-left text-dark">
                                    {{ $value->tanggapan }}
                                </div>
                            </div>
                            <div class="col">
                                <h6><a class="text-success">Tgl Keluhan</a></h6>
                                <div class="text-left text-dark">
                                    {{ $value->keluhan->tgl_keluhan->format('d M, h:i') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
      
        <div class="col-lg-4 col-md-12 col-sm-12 col-12 col">
            <div class="content content-bottom shadow">
                <div>
                    <img src="{{ asset('images/userprofile.png') }}" alt="user profile" class="photo">
                    <div class="self-align">
                        <h3><span class="badge badge-success">{{ Auth::guard('pelanggan')->user()->nama }}</span></h3>
                        <p class="text-left">{{ Auth::guard('pelanggan')->user()->proyek->nama_instansi }}</p>
                    </div>
                    <div class="row text-left">
                        <div class="col my-2">
                            <p class="text-left mb-0">Nama Proyek :
                            <strong class="text-success">{{ Auth::guard('pelanggan')->user()->proyek->nama_proyek }}</strong> </p>
                        </div>
                        <div class="col my-2">
                            <p class="text-left mb-0">Email :
                            <strong class="text-success">{{ Auth::guard('pelanggan')->user()->email }}</strong> </p>
                        </div>
                        <div class="col my-2">
                            <p class="text-left mb-0">Telp :
                            <strong class="text-success">{{ Auth::guard('pelanggan')->user()->telp }}</strong> </p>
                        </div>
                        <div class="col my-2">
                            <p class="text-left mb-0">Alamat :
                            <strong class="text-success">{{ Auth::guard('pelanggan')->user()->proyek->alamat_instansi }}</strong> </p>
                        </div>
                    </div>
                        <hr>
                    <div class="row text-left">
                        <div class="col my-2">
                            <p class="text-left mb-0">Antrian</p>
                            <div class="text-success">
                                {{ $hitung[0] }}
                            </div>
                        </div>
                        <div class="col my-2">
                            <p class="text-left mb-0">Proses</p>
                            <div class="text-success">
                                {{ $hitung[1] }}
                            </div>
                        </div>
                        <div class="col my-2">
                            <p class="text-left mb-0">Selesai</p>
                            <div class="text-success">
                                {{ $hitung[2] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</div>