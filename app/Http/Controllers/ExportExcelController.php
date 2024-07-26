<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PHPExcel;
use PHPExcel_IOFactory;

class ExportExcelController extends Controller
{
    public function export()
    {
        $users = User::all();

        // Buat objek PHPExcel baru
        $objPHPExcel = new PHPExcel();

        // Set properti dokumen
        $objPHPExcel->getProperties()->setCreator("Laravel")
            ->setLastModifiedBy("Laravel")
            ->setTitle("User Data")
            ->setSubject("User Data")
            ->setDescription("User data export.")
            ->setKeywords("laravel phpexcel")
            ->setCategory("Export");

        // Tambahkan data
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'ID')
            ->setCellValue('B1', 'Name')
            ->setCellValue('C1', 'tim');

        $row = 2;
        foreach ($users as $user) {
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A' . $row, $user->id)
                ->setCellValue('B' . $row, $user->name)
                ->setCellValue('C' . $row, $user->tim);
            $row++;
        }

        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('Users');

        // Set active sheet index to the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="users.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }

    public function index()
    {
        $users = User::all();
        return view('users', compact('users'));
    }
}
