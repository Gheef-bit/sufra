<?php

namespace App\Http\Controllers;

use App\Models\fra;
use App\Models\User_indikator;
use Illuminate\Http\Request;

class fraController extends Controller
{
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'pimpinan_rapat' => 'required|string',
            'tanggal_rapat' => 'required',
            'tempat_rapat' => 'required|string',
            'peserta_rapat' => 'required|string',
            'agenda' => 'required|string',
            'kesimpulan' => 'required|string',
            'tanggal_pengisian' => 'required',
            'notulis' => 'required|string',
            // 'foto_ttd_notulis' => 'required|file|image',
        ]);

        // $image_ttd_name = time() . '_' . $validateData['foto_ttd_notulis']->getClientOriginalName();
        // $validateData['foto_ttd_notulis'] = $image_ttd_name;
        // $request->file('foto_ttd_notulis')->storeAs('public/fra', $image_ttd_name);

        $validateData['user_id'] = auth()->user()->id;

        $idd = auth()->user()->id;

        $fra = fra::create($validateData);

        foreach ($request->kendala as $index => $kendala) {
            // $kendala = $request->kendala[$index] ?? '';
            $solusi = $request->solusi[$index] ?? '';
            $rencana_tindak_lanjut = $request->rencana_tindak_lanjut[$index] ?? '';
            if (!empty($kendala)) {
                User_indikator::create([
                    'user_id' => $idd,
                    'kendala' => $kendala,
                    'solusi' => $solusi,
                    'rencana_tindak_lanjut' => $rencana_tindak_lanjut
                ]);
            }
        }

        return redirect()->route('home');

    }
}
