<?php
    include_once dirname(__FILE__) . '/config.php';
    $con=mysqli_connect(HOST_DB,USUARIO_DB,USUARIO_PASS);
    $sql="CREATE DATABASE Taller1";
    if (mysqli_query($con,$sql)) {
		echo "Base de datos Taller1 creada";
    }else {
		echo "Error en la creacion " . mysqli_error($con);
    }
?>