<?php 

    //Para leer archivos tienen que ser descargados en el direcorio, porque sino son dañados.

    require 'vendor/autoload.php';
    require 'conexion2.php';

    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

    $nombreArchivo = "holamundo.xlsx";
    $documento = IOFactory::load($nombreArchivo); // Para poderlo leer
    $totalHojas = $documento->getSheetCount(); // Indica el numero de hojas que contiene, a ser posible que solo sea 1.

    //for($indiceHoja = 0; $indiceHoja < $totalHojas; $indiceHoja++){
        $hojaActual = $documento->getSheet(0);
    //} // Para leer las hojas de la base de datos en el caso de que tenga más de una página, si no tiene más podemos omitir el for

    $numeroFilas = $hojaActual->getHighestDataRow(); //Valor numerico de cuantas filas tienen información
    $letra = $hojaActual -> getHighestColumn(); // Letra maxima donde llega la información.

    $numeroLetra= Coordinate::columnIndexFromString($letra);

    for ($indiceFila = 1; $indiceFila<=$numeroFilas; $indiceFila++){

        $valorA = $hojaActual->getCellByColumnAndRow(1, $indiceFila);
        $valorB = $hojaActual->getCellByColumnAndRow(2, $indiceFila);
        $valorC = $hojaActual->getCellByColumnAndRow(3, $indiceFila);
        $valorD = $hojaActual->getCellByColumnAndRow(4, $indiceFila);

        $sql = "INSERT INTO datos values('$valorA', '$valorB', '$valorC','$valorD' )";
        $mysqli->query($sql);

    }

    echo "Insercción Completada";
?>