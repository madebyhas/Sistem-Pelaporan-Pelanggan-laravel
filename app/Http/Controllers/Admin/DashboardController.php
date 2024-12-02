<?php

namespace App\Http\Controllers\Admin;

use App\Models\Petugas;
use App\Models\Pelanggan;
use App\Models\Keluhan;
use App\Models\Proyek;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all()->count();
        
        $pelanggan = Pelanggan::all()->count();
        
        $proyek = Proyek::all()->count();
        
        $keluhan = keluhan::all()->count();
        
        $pending = Keluhan::where('status', 'pending')->get()->count();
        
        $proses = Keluhan::where('status', 'proses')->get()->count();
        
        $selesai = Keluhan::where('status', 'selesai')->get()->count();
       
        return view('Admin.Dashboard.index', compact('petugas', 'pelanggan', 'proyek','keluhan', 'pending', 'proses', 'selesai' ));
    }
}