<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use PhpOffice\PhpWord\PhpWord;
use App\Models\User;
use App\Models\fra;
use App\Models\Indikator;
use App\Models\User_indikator;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpWord\SimpleType\Jc;

class DashboardController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('dashboard', compact('data'));
    }

    public function fraa()
    {
        // $data = User::all();
        // $fra = fra::all();
        // return view('dashboardd', compact(['data', 'fra']));
        $teams = User::all();

        foreach ($teams as $team) {
            $fraDataExists = Fra::where('tim', $team->tim)->exists();
            $team->fra_status = $fraDataExists ? 'Sudah isi Notulensi' : 'Belum isi Notulensi';
        }

        return view('dashboardd', compact('teams'));
    }

    public function tabel()
    {
        $data = Indikator::with('user_indikator')->get()->groupBy('tim');
        return view('tabel', compact('data'));
    }

    public function dwnld_tabel()
    {
        return Excel::download(new UsersExport, "fra.xlsx");
    }
}
// $fileName = 'Notulen_Rapat_Tim.docx';
//         $tempFilePath = sys_get_temp_dir() . '/' . $fileName;
//         $phpWord->save($tempFilePath, 'Word2007');
//         $phpWord->save($fileName);

//         if (file_exists($tempFilePath)) {
//             return response()->download($tempFilePath, $fileName)->deleteFileAfterSend(true);
//         } else {
//             return response()->json(['message' => 'file not found'], 404);
//         }
//         return view('cetak', compact('data'));
