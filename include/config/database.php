<?php
function conectarDB() : mysqli {

  $db = mysqli_connect("localhost", "root", "root", "todocel");

if(!$db){

    echo "No se Conecto";
    exit;
}

return $db;

}



?>