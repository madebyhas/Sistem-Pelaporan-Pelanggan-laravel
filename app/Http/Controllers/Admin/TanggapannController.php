<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Keluhan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    public function createOrUpdate(Request $request)
    {
        $keluhan = Keluhan::where('id_keluhan', $request->id_keluhan)->first();

        $tanggapan = Tanggapan::where('id_keluhan', $request->id_keluhan)->first();

        if ($tanggapan) {
            $keluhan->update(['status' => $request->status]);

            $tanggapan->update([
                'tgl_tanggapan' => date('Y-m-d'),
                'tanggapan' => $request->tanggapan,
                'id_petugas' => Auth::guard('admin')->user()->id_petugas,
            ]);

            return redirect()->route('keluhan.show', ['keluhan' => $keluhan, 'tanggapan' => $tanggapan])->with(['status' => 'Berhasil Dikirim!']);
        } else {
            $keluhan->update(['status' => $request->status]);

            $tanggapan = Tanggapan::create([
                'id_keluhan' => $request->id_keluhan,
                'tgl_tanggapan' => date('Y-m-d'),
                'tanggapan' => $request->tanggapan,
                'id_petugas' => Auth::guard('admin')->user()->id_petugas,
            ]);

            return redirect()->route('keluhan.show', ['keluhan' => $keluhan, 'tanggapan' => $tanggapan])->with(['status' => 'Berhasil Dikirim!']);
        }
    }
}
