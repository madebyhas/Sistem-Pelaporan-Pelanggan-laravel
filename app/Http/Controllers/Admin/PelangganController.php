<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pelanggan;
use App\Models\Proyek;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class PelangganController extends Controller
{
    
    public function index()
    {

        $pelanggan = Pelanggan::with('proyek')->get();

        return view('Admin.Pelanggan.index', compact('pelanggan'));
    }

    public function edit($id_pelanggan)
    {

        $pelanggan = Pelanggan::where('id_pelanggan', $id_pelanggan)->first();

        return view('Admin.Pelanggan.edit', ['pelanggan' => $pelanggan]);
    }

    public function create()
    {
        $proyek = Proyek::all();

        return view('Admin.Pelanggan.create',  compact('proyek'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'nama' => ['required'],
            'nama_instansi' => ['required'],
            'alamat_instansi' => ['required'],
            'provinsi' => ['required'],
            'email' => ['required'],
            'telp' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->with(['pesan' => 'validasi gagal!']);
        }

        $username = Pelanggan::where('username', $data['username'])->first();

        if ($username) {
                return redirect()->back()->with(['pesan' => 'Username sudah dipakai!']);
        }

        Pelanggan::create([
            'nama' => $data['nama'],
            'nama_instansi' => $data['nama_instansi'],
            'alamat_instansi' => $data['alamat_instansi'],
            'provinsi' => $data['provinsi'],
            'email' => $data['email'],
            'telp' => $data['telp'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('pelanggan.index')->with(['success'=>'Data Pelanggan Disimpan!']);
    }

    public function update(Request $request, $id_pelanggan)
    {
        
        $data = [
            'nama' => $request->nama,
            'nama_instansi' => $request->nama_instansi,
            'alamat_instansi' => $request->alamat_instansi,
            'provinsi' => $request->provinsi,
            'email' => $request->email,
            'telp' => $request->telp,
            'username' => $request->username,
            'password' => Hash::make($request->password),
		];

        Pelanggan::find($id_pelanggan)->update($data);

        return redirect()->route('pelanggan.index');
    }

    public function destroy($id_pelanggan)
    {
        $pelanggan = Pelanggan::findOrFail($id_pelanggan);

        $pelanggan->delete();

        return redirect()->route('pelanggan.index');
    }

}
