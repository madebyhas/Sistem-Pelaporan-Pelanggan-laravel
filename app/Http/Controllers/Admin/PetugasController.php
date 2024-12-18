<?php

namespace App\Http\Controllers\Admin;

use App\Models\Petugas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all();

        return view('Admin.Petugas.index', [ 'petugas' => $petugas]);
    }

    public function create()
    {
        return view('Admin.Petugas.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'nama_petugas' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'unique:petugas'],
            'password' => ['required', 'string', 'min:6'],
            'telp' => ['required'],
            'level' => ['required', 'in:admin,petugas'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->with(['pesan' => 'Username sudah dipakai!']);
        }

        $username = Petugas::where('username', $data['username'])->first();

        if ($username) {
                return redirect()->back()->with(['pesan'=>'Username sudah dipakai!']);
        }

        Petugas::create([
            'nama_petugas' => $data['nama_petugas'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
            'level' => $data['level'],
        ]);
        return redirect()->route('petugas.index')->with(['success'=>'Data Petugas Disimpan!']);
    }

    public function edit($id_petugas)
    {
        $petugas = Petugas::where('id_petugas', $id_petugas)->first();

        return view('Admin.petugas.edit', ['petugas' => $petugas]);
    }

    public function update(Request $request, $id_petugas)
    {
        $data = [
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'telp' => $request->telp,
            'level' => $request->level,
		];

        Petugas::find($id_petugas)->update($data);

        return redirect()->route('petugas.index');
    }

    public function destroy($id_petugas)
    {
        $petugas = Petugas::findOrFail($id_petugas)->delete();

        return redirect()->route('petugas.index');
    }
}
