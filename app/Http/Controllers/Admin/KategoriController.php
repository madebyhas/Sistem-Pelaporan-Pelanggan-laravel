<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use App\Models\Petugas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    public function index()
    {   
        $kategori = Kategori::with('petugas')->get();
        //$kategori = Kategori::all();
        //return $kategori;

        return view('Admin.Kategori.index', compact('kategori'));
    }

    public function create()
    {
        $petugas = Petugas::all();

        return view('Admin.Kategori.create',  compact('petugas'));
    }

    public function store(Request $request)
    {

        $data = $request->all();

        Kategori::create([
            'nama_layanan' => $data['nama_layanan'],
            'id_petugas' => $data['id_petugas'],

        ]);
        return redirect()->route('kategori.index');
    }

    public function edit($id_kategori)
    {
        $kategori = Kategori::where('id_kategori', $id_kategori)->first();

        return view('Admin.kategori.edit', ['kategori' => $kategori]);
    }

    public function update(Request $request, $id_kategori)
    {
        $data = $request->all();

        $kategori = Kategori::find('id_kategori');

        $kategori->update([
            'nama_layanan' => $data['nama_petugas'],
        ]);

        return redirect()->route('petugas.index');
    }

    public function destroy($id_kategori)
    {
        $kategori = Kategori::findOrFail($id_kategori);

        $kategori->delete();

        return redirect()->route('kategori.index');
    }
}
