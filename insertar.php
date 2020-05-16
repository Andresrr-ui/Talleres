<?php
    include_once dirname(__FILE__) . '/config.php';
    $con=mysqli_connect(HOST_DB,USUARIO_DB,USUARIO_PASS,NOMBRE_DB);
    if (mysqli_connect_errno()) {
        echo "Error en la conexión: " . mysqli_connect_error();
    }
    $sql = "INSERT INTO Personas (Cedula, Nombre, Apellido, Correo, Edad) VALUES (13243547,'Juan', 'Perez','juanperez@prueba.com',22)";
    if(mysqli_query($con,$sql)){
        echo "Se ha insertado a Perez Juan";
    }
    else{
        echo "Error insertando a Perez Juan";
    }
    $sql = "INSERT INTO Personas (Cedula, Nombre, Apellido, Correo, Edad) VALUES (23456789,'Andres', 'Rodriguez','andresro@prueba.com',31)";
    if(mysqli_query($con,$sql)){
        echo "Se ha insertado a Andres Rodriguez";
    }
    else{
        echo "Error insertando a Andres Rodriguez";
    }
    mysqli_close($con);
?>