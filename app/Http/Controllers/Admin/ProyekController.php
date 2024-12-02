<?php

namespace App\Http\Controllers\Admin;

use App\Models\Proyek;
use App\Models\Pelanggan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    public function index()
    {
        $proyek = Proyek::with('pelanggan')->get();

        return view('Admin.proyek.index', compact('proyek'));
    }

    public function create()
    {
        $pelanggan = Pelanggan::all();

        return view('Admin.Proyek.create',  compact('pelanggan'));
    }


    public function store(Request $request)
    {
         
        $data = $request->all();

        $nama_proyek = Proyek::where('nama_proyek', $data['nama_proyek'])->first();

        if ($nama_proyek) {
                return redirect()->back()->with(['pesan' => 'Nama Proyek telah dipakai!']);
        }

        Proyek::create([
            'id_pelanggan' => $data['id_pelanggan'],
            'nama_proyek' => $data['nama_proyek'],
            'jangka_waktu_awal' => $data['jangka_waktu_awal'],
            'jangka_waktu_akhir' => $data['jangka_waktu_akhir'],
            'garansi' => $data['garansi'],

        ]);
        return redirect()->route('proyek.index')->with(['success'=>'Data Proyek Disimpan!']);
    }

    public function update(Request $request, $id_proyek)
    {
        $data = [
            'id_pelanggan' => $request->id_pelanggan,
            'nama_proyek' => $request->nama_proyek,
            'jangka_waktu_awal' => $request->jangka_waktu_awal,
            'jangka_waktu_akhir' => $request->jangka_waktu_akhir,
            'garansi' => $request->garansi,
		];

        Proyek::find($id_proyek)->update($data);
        
        return redirect()->route('proyek.index');
    }

    public function edit($id_proyek)
    {
        $pelanggan = Pelanggan::all();

        $proyek = Proyek::where('id_proyek', $id_proyek)->first();

        return view('Admin.proyek.edit', compact('pelanggan'), ['proyek' => $proyek]);
    }

    public function destroy($id_proyek)
    {
        $proyek = Proyek::findOrFail($id_proyek);

        $proyek->delete();

        return redirect()->route('proyek.index');
    }
}
