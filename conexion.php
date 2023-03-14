<?php 

$mysqli = new mysqli('localhost','root','','wordpress');

if ($mysqli->connect_errno){
    echo "Fallo en la conexión" . $mysqli->connect_errno;
    die();
}

?>