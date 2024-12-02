<?php

namespace App\Http\Controllers\Admin;

use App\Models\Penindakan;
use App\Models\Keluhan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenindakanController extends Controller
{
    public function createOrUpdate(Request $request)
    {
        $keluhan = Keluhan::all()->first();

        $penindakan = Penindakan::all()->first();

        if ($penindakan) {
            $keluhan->update(['status' => $request->status]);

            $penindakan->update([
                'tgl_penindakan' => date('Y-m-d'),
                'penindakan' => $request->penindakan,
                'id_petugas' => Auth::guard('admin')->user()->id_petugas,
            ]);

            return redirect()->route('Admin.keluhan.show', ['keluhan' => $keluhan, 'penindakan' => $penindakan])->with(['status' => 'Berhasil Dikirim!']);
    } else {
        $keluhan->update(['status' => $request->status]);


        $penindakan = Penindakan::create([
            'id_keluhan' => $request->id_keluhan,
            'tgl_penindakan' => date('Y-m-d'),
            'penindakan' => $request->penindakan,
            'id_petugas' => Auth::guard('admin')->user()->id_petugas,
        ]);

        return redirect()->route('Admin.keluhan.show', ['keluhan' => $keluhan, 'penindakan' => $penindakan])->with(['status' => 'Berhasil Dikirim!']);
    }
}
}
