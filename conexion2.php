<?php 

$mysqli = new mysqli('localhost','root','','wordpress2');

if ($mysqli->connect_errno){
    echo "Fallo en la conexión" . $mysqli->connect_errno;
    die();
}

?>