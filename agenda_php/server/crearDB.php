<?php
require('./conector.php');
$con = new ConectorBD();
if(  $con->initConexion($con->database) == 1049){
  $conexion['msg'] = "Creando base de datos ".$con->database;
  $database = $con->newDatabase();

    if ($database != "OK"){

        $conexion['database'] = "OK";
        $conexion['msg'] = "Base de datos creada con éxito";

    }
  }else{

    $conexion['database'] = "OK";
    $conexion['msg'] = "Base de datos <b>".$con->database."</b> encontrada";
}
 echo json_encode($conexion);

?>
