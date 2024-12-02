<?php

namespace App\Http\Controllers\Admin;

use App\Models\Keluhan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        return view('Admin.Laporan.index');
    }
    
    public function getLaporan(Request $request)
    {
        $from = $request->from . ' ' . '00:00:00';
        
        $to = $request->to . ' ' . '23:59:59';

        $keluhan = Keluhan::whereBetween('tgl_keluhan', [$from, $to])->get();

        return view('Admin.Laporan.index', ['keluhan' => $keluhan, 'from' => $from, 'to' => $to]);
    }
    public function cetakLaporan($from, $to)
    {

        $keluhan = Keluhan::whereBetween('tgl_keluhan', [$from, $to])->get();

        $pdf = PDF::loadView('admin.laporan.cetak', ['keluhan' => $keluhan]);

        return $pdf->download('laporan-keluhan.pdf');
    }
}
