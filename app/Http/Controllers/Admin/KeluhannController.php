<?php

namespace App\Http\Controllers\Admin;

use App\Models\Keluhan; 
use App\Models\Penindakan; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeluhanController extends Controller
{
    public function index()
    {
        $keluhan = Keluhan::orderBy('tgl_keluhan', 'desc')->get();

        return view('Admin.Keluhan.index', ['keluhan' => $keluhan]);
    }

    public function show($id_keluhan)
    {
        $keluhan = Keluhan::all()->first();

        $penindakan = Penindakan::all()->first();

        return view('Admin.Keluhan.show', ['keluhan' => $keluhan, 'penindakan' => $penindakan]);
    }
}
