<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\Proyek;
use App\Models\Keluhan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function index()
    {
        $proyek = Proyek::all();

        return view('user.dashboard.index', compact('proyek'));
    }

    public function login(Request $request)
    {
        $username = Pelanggan::where('username', $request->username)->first();

        if (!$username) {
            return redirect()->back()->with(['pesan' => 'Username tidak terdaftar']);
        }

        $password = Hash::check($request->password, $username->password);

        if (!$password) {
            return redirect()->back()->with(['pesan' => 'Password tidak sesuai']);
        }
        
        $auth = Auth::guard('pelanggan')->attempt(['username' => $request->username, 'password' => $request->password]);
        if ($auth) {
            return redirect()->route('user.dashboard.index');
        } else {
            return redirect()->back()->with(['pesan' => 'Akun tidak terdaftar!']);
        }
    }


    public function register(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'nama' => ['required'],
            'email' => ['required'],
            'telp' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->with(['pesan' => $validate->errors()]);
        }

        $username = Pelanggan::where('username', $request->username)->first();

        if ($username) {
            return redirect()->back()->with(['pesan' => 'Username sudah terdaftar']);
        }

        Pelanggan::create([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'telp' => $data['telp'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);

        return view('user.register');
    }

    public function logout()
    {
        Auth::guard('pelanggan')->logout();

        return redirect()->back();
    }

    public function storeKeluhan(Request $request)
    {
        $proyek = Proyek::all();
        
        if (!Auth::guard('pelanggan')->user()) {
            return redirect()->back()->with(['pesan' => 'Login dibutuhkan!'])->withInput();
        }

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
            'tgl_keluhan' => date('Y-m-d h:i:s'),
            'isi_keluhan' => $data['isi_keluhan'],
            'foto' => $data['foto'] ?? '',
            'status' => '0',
        ]);

        if ($keluhan) {
            return redirect()->route('pelukan.laporan', 'me')->with(['keluhan' => 'Berhasil terkirim!', 'type' => 'success']);
        } else {
            return redirect()->back()->with(['keluhan' => 'Gagal terkirim!', 'type' => 'danger']);
        }
    }

    public function laporan($siapa = '')
    {

        $antrian = Keluhan::where([['id_proyek'], ['status', '0']])->get()->count();
        $proses = Keluhan::where([['id_proyek'], ['status', 'proses']])->get()->count();
        $selesai = Keluhan::where([['id_proyek'], ['status', 'selesai']])->get()->count();

        $hitung = [$antrian, $proses, $selesai];

        if ($siapa == 'me') {

            $keluhan = Keluhan::where('id_proyek')->orderBy('tgl_keluhan', 'desc')->get();

            return view('user.laporan', ['keluhan' => $keluhan, 'hitung' => $hitung, 'siapa' => $siapa]);
        } else {
            
            $keluhan = Keluhan::where([['id_proyek'], ['status', '!=', '0']])->orderBy('tgl_keluhan', 'desc')->get();

            return view('user.laporan', ['keluhan' => $keluhan,'hitung' => $hitung, 'siapa' => $siapa]);
        }
    }

}
