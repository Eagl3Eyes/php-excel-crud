<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

$fileName = 'data.xlsx';

if (file_exists($fileName)) {
    $spreadsheet = IOFactory::load($fileName);
    $sheet = $spreadsheet->getActiveSheet();
    $data = $sheet->toArray();

    echo '<table border="1">';
    echo '<tr><th>Name</th><th>Email</th><th>Age</th><th>Actions</th></tr>';

    foreach ($data as $key => $row) {
        if ($key == 0) continue;

        echo '<tr>';
        echo '<td>' . $row[0] . '</td>';
        echo '<td>' . $row[1] . '</td>';
        echo '<td>' . $row[2] . '</td>';
        echo '<td>';
        echo '<a href="edit.php?id=' . $key . '">Edit</a> | ';
        echo '<a href="delete.php?id=' . $key . '">Delete</a>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo 'No data available.';
}
?>
