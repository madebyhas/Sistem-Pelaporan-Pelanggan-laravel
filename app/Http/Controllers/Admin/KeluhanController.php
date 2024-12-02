<?php

namespace App\Http\Controllers\Admin;

use App\Models\Keluhan;
use App\Models\Penindakan;
use App\Models\Proyek;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KeluhanController extends Controller
{   
    public function index()
    {
        $keluhan = Keluhan::orderBy('tgl_keluhan', 'desc')->get();

        return view('Admin.Keluhan.index', ['keluhan' => $keluhan]);
    }

    public function show($id_keluhan)
    {
        $keluhan = Keluhan::where('id_keluhan', $id_keluhan)->first();

        $penindakan = Penindakan::where('id_keluhan', $id_keluhan)->first();

        return view('Admin.Keluhan.show', ['keluhan' => $keluhan, 'penindakan' => $penindakan]);
    }
    
}

