<?php
    include_once dirname(__FILE__) . '/config.php';
    $con=mysqli_connect(HOST_DB,USUARIO_DB,USUARIO_PASS,NOMBRE_DB);
    $sql = "CREATE TABLE PERSONAS 
( CEDULA INT NOT NULL 
, NOMBRE VARCHAR(20) NOT NULL 
, APELLIDO VARCHAR(20) 
, CORREO VARCHAR(20) 
, EDAD INT 
, PRIMARY KEY 
  (CEDULA))";
    if (mysqli_query($con, $sql)) {
        echo "Tabla Personas creada correctamente";
    } else {
        echo "Error en la creacion " . mysqli_error($con);
    }
?>