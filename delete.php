<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$fileName = 'data.xlsx';

if (isset($_GET['id'])) {
    $id = $_GET['id'] + 1;

    
    $spreadsheet = IOFactory::load($fileName);
    $sheet = $spreadsheet->getActiveSheet();

    
    $sheet->removeRow($id);

    $writer = new Xlsx($spreadsheet);
    $writer->save($fileName);

    header("Location: index.php");
    exit();
}
?>