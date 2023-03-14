<?php 
require 'vendor/autoload.php';


// Añadir libreria
use PhpOffice\PhpSpreadsheet\Spreadsheet;
//use PhpOffice\PhpSpreadsheet\Writer\Xlsx; //La comento porque ahora utilizo la de abajo
use \PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new Spreadsheet(); //inicializar el spreadshet
$spreadsheet->getProperties()->setCreator("Carlos Pérez")->setTitle("Mi Excel"); //Agregar propiedades al fichero
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->setCellValue('A1', 'Hello World !'); //Meter un valor en una celda
$spreadsheet->getDefaultStyle()->getFont()->setName('Tahoma'); // Establecer Tahoma como fuente de texto
$spreadsheet->getDefaultStyle()->getFont()->setSize(15); //Establecer tamaño de letra por defeto
$activeWorksheet->getColumnDimension('A')->setWidth(30); //Darle tamaño a la celda A
$activeWorksheet->getColumnDimension('B')->setWidth(20); //Darle tamaño a la celda B

/* Para ficheros XLSX y descargarlo */
//header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); //Tipo de hoja de calculo
//header('Content-Disposition: attachment;filename="prueba2.xlsx"'); //Nombre del archivo
//header('Cache-Control: max-age=0'); //Parte del cache

//$writer = IOFactory::createWriter($spreadsheet, 'Xlsx'); // Para llamar al use que tenemos arriba
//$writer->save('php://output');

/* Para ficheros XLS y descargalo */

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="mifichero.xls"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xls');
$writer->save('php://output');


/*Para ficheros xlsx,xls o csv y descarga en la carpeta dode estas */
/*$writer = new Xlsx($spreadsheet);
$writer->save('prueba1.xlsx');*/ //nombre del archivo

?>