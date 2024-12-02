<?php

namespace App\Http\Controllers\User;

use App\Models\Proyek;
use App\Models\Keluhan;
use App\Models\penindakan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomepageController extends Controller
{
    public function index()
    {  

        $pelanggan = Pelanggan::with('proyek')->get();
        $penindakan = Penindakan::all();
        
        return view('User.Dashboard.index', ['pelanggan' => $pelanggan, 'penindakan' => $penindakan]);
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

    public function logout()
    {
        Auth::guard('pelanggan')->logout();

        return redirect()->back();
    }
}

