<?php
    require 'vendor/autoload.php';
    require 'conexion.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    //use \PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    //también se puede use \PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};
    if (isset($_POST["status"])){
    $status=$mysqli->real_escape_string($_POST["status"]); // Para que no haya concurrencia de codigo ponemos dicho mysqli
    $sql = "Select action_id, hook, status, scheduled_date_gmt FROM wp_actionscheduler_actions where status LIKE '".$status."'";
    } else {
        $sql = "Select action_id, hook, status, scheduled_date_gmt FROM wp_actionscheduler_actions";
    }
    $resultado = $mysqli->query($sql);

    $excel = new Spreadsheet();
    $hojaActiva = $excel->getActiveSheet();
    $hojaActiva->setTitle("Acciones");

    $hojaActiva->getColumnDimension("A")->setWidth(20);
    $hojaActiva->setCellValue("A1","action_id");
    $hojaActiva->getColumnDimension("B")->setWidth(50);
    $hojaActiva->setCellValue("B1","hook");
    $hojaActiva->getColumnDimension("C")->setWidth(25);
    $hojaActiva->setCellValue("C1","status");
    $hojaActiva->getColumnDimension("D")->setWidth(25);
    $hojaActiva->setCellValue("D1","scheduled_date_gmt");

    $fila=2;

    while($rows = $resultado->fetch_assoc()){
        $hojaActiva->setCellValue("A".$fila, $rows["action_id"]);
        $hojaActiva->setCellValue("B".$fila, $rows["hook"]);
        $hojaActiva->setCellValue("C".$fila, $rows["status"]);
        $hojaActiva->setCellValue("D".$fila, $rows["scheduled_date_gmt"]);
        $fila++;
    }

    $writer = new Xlsx($excel);
    $writer->save('holamundo.xlsx');
    exit;

?>