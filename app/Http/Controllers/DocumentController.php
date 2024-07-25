<?php

namespace App\Http\Controllers;

use PhpOffice\PhpWord\PhpWord;
use App\Models\User;
use App\Models\fra;
use App\Models\Indikator;
use App\Models\TanyaJawab;
use App\Models\User_indikator;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\SimpleType\Jc;

class DocumentController extends Controller
{
    public function index(User $user)
    {
        $data = fra::where('tim', $user->tim)->get();
        return view('cetak', ['data' => $data]);
        // return view('cetak',['tim' => $tim]);
    }

    public function createDocument(User $user)
    {
        $fra = fra::where('tim', $user->tim)->get();
        $indikator = Indikator::where('tim', $user->tim)->get();
        $uindikator = User_indikator::where('tim', $user->tim)->get();
        $tanyajawab = TanyaJawab::where('tim', $user->tim)->get();

        $combined_indikators = [];

        $count = max(count($indikator), count($uindikator));

        for ($i = 0; $i < $count; $i++) {
            $combined_indikators[] = [
                'judul' => $indikator[$i]->judul ?? '',
                'keterangan' => $indikator[$i]->keterangan ?? '',
                'kendala' => $uindikator[$i]->kendala ?? '',
                'solusi' => $uindikator[$i]->solusi ?? '',
                'rencana_tindak_lanjut' => $uindikator[$i]->rencana_tindak_lanjut ?? ''
            ];
        }

        $phpWord = new PhpWord();

        $phpWord->addTableStyle('Table', [
            'borderSize' => 6,
            'borderColor' => 'black',
            'cellMarginTop' => 100,
            'cellMarginLeft' => 80,
            'cellMarginRight' => 80,
            'cellMarginBottom' => 100
        ]);
        $phpWord->addTableStyle('NoBorderTable', [
            'borderSize' => 0,
            'borderColor' => 'FFFFFF',
            'cellMarginTop' => 100,
            'cellMarginLeft' => 80,
            'cellMarginRight' => 80,
            'cellMarginBottom' => 100
        ]);
        // $cellStyle = ['align' => 'center'];
        $cellTextStyle = ['bold' => true];
        $headerStyle = ['bold' => true, 'bgColor' => 'D9D9D9'];

        $paragraphStyle = [
            // 'alignment' => Jc::CENTER,
            'spaceAfter' => 0,
            'spaceBefore' => 0,
            'spacing' => 0,
            'lineHeight' => 1
        ];

        $tjparagraphStyle = [
            'alignment' => Jc::CENTER,
            'spaceAfter' => 0,
            'spaceBefore' => 0,
            'spacing' => 0,
            'lineHeight' => 1
        ];

        $ttdparagraphStyle = [
            'alignment' => Jc::CENTER,
            'spaceAfter' => 0,
            'spaceBefore' => 0,
            'spacing' => 0,
            'lineHeight' => 1
        ];

        // Define font style
        $hfontStyle = [
            'name' => 'Times New Roman',
            'size' => 12,
            'bold' => true
        ];

        $fontStyle = [
            'name' => 'Times New Roman',
            'size' => 12,
        ];

        $rfontStyle = [
            'name' => 'Times New Roman',
            'size' => 10,
        ];



        // Create a section
        $section = $phpWord->addSection();

        // Add table
        $table = $section->addTable('Table');

        // Add header row
        $table->addRow();
        $table->addCell(2000, $headerStyle)->addText('Unit Kerja', $hfontStyle, $paragraphStyle);
        $table->addCell(4000)->addText('BPS Provinsi Jambi', $fontStyle, $paragraphStyle);
        $table->addCell(2000, $headerStyle)->addText('Tanggal Rapat', $hfontStyle, $paragraphStyle);
        $table->addCell(4000)->addText($fra[0]->tanggal_rapat, $fontStyle, $paragraphStyle);

        $table->addRow();
        $table->addCell(2000, $headerStyle)->addText('Pimpinan Rapat', $hfontStyle, $paragraphStyle);
        $table->addCell(4000)->addText($fra[0]->pimpinan_rapat, $fontStyle, $paragraphStyle);
        $table->addCell(2000, $headerStyle)->addText('Tempat Rapat', $hfontStyle, $paragraphStyle);
        $table->addCell(4000)->addText($fra[0]->tempat_rapat, $fontStyle, $paragraphStyle);

        $table->addRow();
        $table->addCell(2000, $headerStyle)->addText('Topik Rapat', $hfontStyle, $paragraphStyle);
        $table->addCell(10000, ['gridSpan' => 3])->addText($user->topik, $fontStyle, $paragraphStyle);

        $section->addTextBreak(1);

        // Add participants
        $tablepeserta = $section->addTable('Table');

        $tablepeserta->addRow();
        $tablepeserta->addCell(12000)->addText('Peserta:', $hfontStyle, $paragraphStyle);
        $tablepeserta->addRow();
        $tablepeserta->addCell(12000)->addText($fra[0]->peserta_rapat, $fontStyle, $paragraphStyle);

        $section->addTextBreak(1);

        $tagenda = $section->addTable('Table');
        $tagenda->addRow();

        $cellagenda = $tagenda->addCell(12000);
        $txtrun = $cellagenda->addTextRun();
        $txtrun->addText('AGENDA', $hfontStyle);
        $txtrun->addTextBreak(1);
        $txtrun->addText('Pembahasan Capaian Kinerja Triwulan II: ', $fontStyle);
        $txtrun->addTextBreak(1);
        $txtrun->addText($fra[0]->agenda, $rfontStyle);

        foreach ($combined_indikators as $i) {
            $txtrun->addTextBreak(2);
            $txtrun->addText($i['judul'], $hfontStyle, $cellTextStyle);
            $txtrun->addTextBreak(1);
            $txtrun->addText($i['keterangan'], $rfontStyle);

            $txtrun->addTextBreak(2);
            $txtrun->addText('Kendala:', $hfontStyle);
            $txtrun->addTextBreak(1);
            $txtrun->addText($i['kendala'], $rfontStyle);

            $txtrun->addTextBreak(2);
            $txtrun->addText('Solusi:', $hfontStyle);
            $txtrun->addTextBreak(1);
            $txtrun->addText($i['solusi'], $rfontStyle);

            $txtrun->addTextBreak(2);
            $txtrun->addText('Rencana Tindak Lanjut:', $hfontStyle);
            $txtrun->addTextBreak(1);
            $txtrun->addText($i['rencana_tindak_lanjut'], $rfontStyle);
        }

        $txtrun->addTextBreak(2);
        $txtrun->addText('Kesimpulan:', $hfontStyle);
        $txtrun->addTextBreak(1);
        $txtrun->addText($fra[0]->kesimpulan, $rfontStyle, $paragraphStyle);

        // Add discussion/Q&A
        $section->addTextBreak(1);
        $section->addText('Diskusi/Tanya Jawab:', $hfontStyle);

        $discussionTable = $section->addTable('Table');
        $discussionTable->addRow();
        $discussionTable->addCell(2000, $headerStyle)->addText('Nama', $hfontStyle, $tjparagraphStyle);
        $discussionTable->addCell(5000, $headerStyle)->addText('Pertanyaan/Masukan', $hfontStyle, $tjparagraphStyle);
        $discussionTable->addCell(5000, $headerStyle)->addText('Jawaban', $hfontStyle, $tjparagraphStyle);

        foreach ($tanyajawab as $tj) {
            $discussionTable->addRow();
            $discussionTable->addCell(2000)->addText($tj->nama_penanya, $fontStyle, $paragraphStyle);
            $discussionTable->addCell(5000)->addText($tj->pertanyaan, $fontStyle, $paragraphStyle);
            $discussionTable->addCell(5000)->addText($tj->jawaban, $fontStyle, $paragraphStyle);
        }

        $section->addTextBreak(1);

        $discussionTable = $section->addTable('NoBorderTable');
        $discussionTable->addRow();
        $discussionTable->addCell(4000)->addText('', $hfontStyle, $tjparagraphStyle);
        $discussionTable->addCell(4000)->addText('', $hfontStyle, $tjparagraphStyle);
        $cella = $discussionTable->addCell(4000);
        $txtruun = $cella->addTextRun();
        $txtruun->addText('Jambi,  ', $fontStyle);
        $txtruun->addText($fra[0]->tanggal_pengisian, $fontStyle);
        // $discussionTable->addCell(4000)->addText(, $fontStyle, $paragraphStyle);

        $discussionTable->addRow();
        $discussionTable->addCell(4000)->addText('', $hfontStyle, $tjparagraphStyle);
        $discussionTable->addCell(4000)->addText('', $hfontStyle, $tjparagraphStyle);
        $discussionTable->addCell(4000)->addText('Mengetahui,', $fontStyle, $tjparagraphStyle);

        $discussionTable->addRow();
        $discussionTable->addCell(4000)->addText('Notulis', $fontStyle, $tjparagraphStyle);
        $discussionTable->addCell(4000)->addText('', $fontStyle, $tjparagraphStyle);
        $discussionTable->addCell(4000)->addText('Pejabat yang Berwenang', $fontStyle, $tjparagraphStyle);

        $discussionTable->addRow();
        $discussionTable->addCell(4000)->addText('');
        $discussionTable->addCell(4000)->addText('');
        $discussionTable->addCell(4000)->addText('');

        $discussionTable->addRow();
        $discussionTable->addCell(4000)->addText('');
        $discussionTable->addCell(4000)->addText('');
        $discussionTable->addCell(4000)->addText('');

        $discussionTable->addRow();
        $discussionTable->addCell(4000)->addText($fra[0]->notulis, $fontStyle, $tjparagraphStyle);
        $discussionTable->addCell(4000)->addText('', $fontStyle, $tjparagraphStyle);
        $discussionTable->addCell(4000)->addText($fra[0]->pjwenang, $fontStyle, $tjparagraphStyle);
        // ('NoBorderTable');


        // Save file
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $fileName = 'Surat_Rapat_' . time() . '.docx';
        $filePath = storage_path('app/public/' . $fileName);
        $objWriter->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
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
