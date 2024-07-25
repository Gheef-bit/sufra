<?php

namespace App\Http\Controllers;

use App\Models\FileUpload;
use App\Models\fra;
use App\Models\TanyaJawab;
use App\Models\User_indikator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'pjwenang' => 'required|string',
            // 'foto_ttd_notulis' => 'required|file|image',
        ]);

        // $image_ttd_name = time() . '_' . $validateData['foto_ttd_notulis']->getClientOriginalName();
        // $validateData['foto_ttd_notulis'] = $image_ttd_name;
        // $request->file('foto_ttd_notulis')->storeAs('public/fra', $image_ttd_name);

        $validateData['user_id'] = auth()->user()->id;
        $validateData['tim'] = auth()->user()->tim;

        $idd = auth()->user()->id;
        $ttim = auth()->user()->tim;

        $fra = fra::create($validateData);

        foreach ($request->kendala as $index => $kendala) {
            // $kendala = $request->kendala[$index] ?? '';
            $solusi = $request->solusi[$index] ?? '';
            $rencana_tindak_lanjut = $request->rencana_tindak_lanjut[$index] ?? '';
            if (!empty($kendala)) {
                User_indikator::create([
                    'user_id' => $idd,
                    'tim' => $ttim,
                    'kendala' => $kendala,
                    'solusi' => $solusi,
                    'rencana_tindak_lanjut' => $rencana_tindak_lanjut
                ]);
            }
        }

        foreach ($request->nama_penanya as $index => $nama_penanya) {
            $pertanyaan = $request->pertanyaan[$index] ?? '';
            $jawaban = $request->jawaban[$index] ?? '';
            if (!empty($nama_penanya)) {
                TanyaJawab::create([
                    'user_id' => $idd,
                    'tim' => $ttim,
                    'nama_penanya' => $nama_penanya,
                    'pertanyaan' => $pertanyaan,
                    'jawaban' => $jawaban
                ]);
            }
        }

        $request->validate([
            'files.*' => 'required'
        ]);
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();

                $path = $file->storeAs('public/fra', $filename);


                FileUpload::create([
                    'user_id' => $idd,
                    'tim' => $ttim,
                    'file_name' => $filename,
                    'file_path' => $path
                ]);
            }

            // $file->storeAs('public/fra/', $filename);
            // $filemodel = new FileUpload;
            // $filemodel->user_id = $idd;
            // $filemodel->tim = $ttim;
            // $filemodel->file_name = $filename;
            // $filemodel->file_path = 'public/fra/' . $filename;
            // $filemodel->save();
        }

        // foreach ($request->file('files') as $file) {
        //     $path = $file->storeAs('public/fra');

        //     $result = FileUpload::create([
        //         'user_id' => $idd,
        //         'tim' => $ttim,
        //         'file_name' => $file->getClientOriginalName(),
        //         'file_path' => $path,
        //     ]);

        //     if ($result) {
        //         return "berhasil";
        //     } else {
        //         return "Gagal";
        //     }
        // }

        return redirect()->route('home');
    }
}
