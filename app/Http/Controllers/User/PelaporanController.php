<?php

namespace App\Http\Controllers\User;

use App\Models\Proyek;
use App\Models\Keluhan;
use App\Models\petugas;
use PDF;
use App\Models\Penindakan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PelaporanController extends Controller
{
    public function index()
    {
        $petugas = Petugas::orderBy('nama_petugas', 'asc')->get()->pluck('nama_petugas', 'id_petugas');

        $keluhan = Keluhan::select('keluhan.*', 'proyek.id_proyek', 'pelanggan.id_pelanggan', 'penindakan.tanggapan')
        	->join('proyek', 'proyek.id_proyek', '=', 'keluhan.id_keluhan')
        	->join('pelanggan', 'pelanggan.id_pelanggan', '=', 'keluhan.id_keluhan')
        	->join('penindakan', 'penindakan.id_penindakan', '=', 'keluhan.id_keluhan')
        	->get();
        
        $keluhan = Keluhan::all();

        return view('user.pelaporan.index', compact('keluhan', 'petugas'));
    }
    
    
    public function create()
    {
        $proyek = Proyek::where('id_pelanggan', Auth::guard('pelanggan')->user()->id_pelanggan)->get();

        return view('user.pelaporan.create', compact('proyek'));
    }
    
    public function store(Request $request)
    {
        
        $data = $request->all();
        
        $validate = Validator::make($data, [
            'isi_keluhan' => ['required'],
        ]);
        
        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }
        
        if ($request->file('foto')) {
            $data['foto'] = $request->file('foto')->store('assets/keluhan', 'public');
        }
        
        date_default_timezone_set('Asia/Bangkok');
        
        $keluhan = Keluhan::create([
            'id_proyek' => $data['id_proyek'],
            'tgl_keluhan' => date('Y-m-d h:i:s'),
            'isi_keluhan' => $data['isi_keluhan'],
            'foto' => $data['foto'] ?? '',
            'status' => '0',
        ]);
        
        if ($keluhan) {
            return redirect()->route('pelaporan.index')->with(['success' => 'keluhan anda berhasil terkirim! Mohon menunggu tanggapan dari kami !', 'type' => 'success']);
        } else {
            return redirect()->back()->with(['erorr' => 'Gagal terkirim!']);
        }
    }
    
    public function edit($id_penindakan)
    {
        
        $penindakan = penindakan::where('id_penindakan', $id_penindakan)->first();
        
        if(empty($penindakan)){
            return redirect()->route('pelaporan.index')->with(['belum' => 'Belum ada tanggapan dari Petugas']);
        }
        else{
            return view('user.pelaporan.edit', ['penindakan' => $penindakan]);
        }

    }
    
    public function destroy($id_keluhan)
    {
        $keluhan = Keluhan::findOrFail($id_keluhan);

        $keluhan->delete();

        return redirect()->route('user.pelaporan.index');
    }

    public function getLaporan(Request $request)
    {

        $penindakan = Penindakan::where('id_penindakan', Auth::guard('pelanggan')->user()->id_pelanggan)->get();

        return view('User.pelaporan.index', ['penindakan' => $penindakan]);
    }
    public function cetakLaporan()
    {

        $penindakan = Penindakan::where('id_penindakan', Auth::guard('pelanggan')->user()->id_pelanggan)->get();


        $pdf = PDF::loadView('user.pelaporan.cetak', ['penindakan' => $penindakan]);

        return $pdf->download('pelaporan-keluhan-pelanggan.pdf');

    }

}

