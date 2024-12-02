<?php

namespace App\Http\Controllers\Admin;

use App\Models\Keluhan;
use App\Models\Penindakan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PenindakanController extends Controller
{
    public function createOrUpdate(Request $request)
    {
        $keluhan = Keluhan::where('id_keluhan', $id_keluhan)->first();

        $penindakan = Penindakan::where('id_keluhan', $id_keluhan)->first();

        if ($penindakan) {
            $keluhan->update(['status' => $request->status]);

            $penindakan->update([
                'tgl_penindakan' => date('Y-m-d'),
                'penindakan' => $request->penindakan,
                'id_petugas' => Auth::guard('admin')->user()->id_petugas,
            ]);

            return redirect()->route('Admin.keluhan.show', compact('keluhan', 'penindakan'))->with(['status' => 'Berhasil Dikirim!']);
        } else {
            $keluhan->update(['status' => $request->status]);
    
        $penindakan = Penindakan::create([
                'id_keluhan' => $request->id_keluhan,
                'tgl_penindakan' => date('Y-m-d'),
                'penindakan' => $request->penindakan,
                'id_petugas' => Auth::guard('admin')->user()->id_petugas,
            ]);

    return redirect()->back( compact('keluhan', 'penindakan'))->with(['status' => 'Berhasil Dikirim!']);
    }
    }
}
