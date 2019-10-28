<?php
  require('./conector.php');

  $con = new ConectorBD();

  $response['conexion']=$con->initConexion($con->database);

  if ($response['conexion']=='OK') {

  	$conexion = $con->getConexion();

  	$insert = $conexion->prepare('INSERT INTO usuarios (email, nombre, password, fecha_nacimiento) VALUES (?,?,?,?)');

    $insert->bind_param("ssss", $email, $nombre, $password, $fecha_nacimiento);

    $defaultPassword = '123456';
    $email = "diego@gmail.com";
	  $nombre = "diego";
    $password = password_hash($defaultPassword, PASSWORD_DEFAULT);
    $fecha_nacimiento = "1989-11-11";


    $insert->execute();

    $email = "daniela@gmail.com";
	  $nombre = "Daniela Medina";
    $password = password_hash($defaultPassword, PASSWORD_DEFAULT);
    $fecha_nacimiento = "1986-03-19";

    $insert->execute();

    $email = "zaida@gmail.com";
	  $nombre = "Zaida Mendez";
    $password = password_hash($defaultPassword, PASSWORD_DEFAULT);
    $fecha_nacimiento = "1967-11-26";

    $insert->execute();

    $response['resultado']="1";
    $response['msg']= 'Iniciar sesion con: daniela@gmail.com / diego@gmail.com / zaida@gmail.com - contraseña por defecto: 123456</br>';
      $getUsers = $con->consultar(['usuarios'], ['*'], $condicion = "");
      while ($fila = $getUsers->fetch_assoc()){

      }



  }else{
    $response['resultado']="0";
    $response['msg']= "No se pudo conectar a la base de datos";
  }

  echo json_encode($response);



?>
