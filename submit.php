<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $fileName = 'data.xlsx';

    if (file_exists($fileName)) {
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($fileName);
        $sheet = $spreadsheet->getActiveSheet();
        $row = $sheet->getHighestRow() + 1;
    } else {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Name');
        $sheet->setCellValue('B1', 'Email');
        $sheet->setCellValue('C1', 'Age');
        $row = 2;
    }

    $sheet->setCellValue('A' . $row, $name);
    $sheet->setCellValue('B' . $row, $email);
    $sheet->setCellValue('C' . $row, $age);

    $writer = new Xlsx($spreadsheet);
    $writer->save($fileName);

    header("Location: index.php");
    exit();
}
?>
