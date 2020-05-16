<?php
   include_once dirname(__FILE__) . '/config.php';
            $str_datos = "";
             $con=mysqli_connect(HOST_DB,USUARIO_DB,USUARIO_PASS,NOMBRE_DB);
                if (mysqli_connect_errno()) {
                $str_datos.= "Error en la conexión: " . mysqli_connect_error();
            }
?>
<!DOCTYPE html>
<html>

    <head>
         <meta charset="UTF-8">
  <title>Index Personas</title>
  <link rel="stylesheet" href="css/estilo.css">
    </head>
    <body>
<br>
<a href="index_archivo.html" class="btn__update">Cargar Archivos</a>
<a href="nuevo.php" class="btn__update">Agregar Persona</a>
  <div class="contenedor">
        <table border="1">
            <tr class="head">
                <td>Cedula</td>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Correo</td>
                <td>Edad</td>
                <td colspan="2">Acción</td>     
            </tr>    
        <?php
            $sql = "SELECT * from personas";
            $resultado = mysqli_query($con,$sql);
            while($fila = mysqli_fetch_array($resultado)) {
         ?>
           <tr>
           <td><?php echo $fila['CEDULA']?></td>
           <td><?php echo $fila['NOMBRE']?></td>
           <td><?php echo $fila['APELLIDO']?></td>
           <td><?php echo $fila['CORREO']?></td>
           <td><?php echo $fila['EDAD']?></td>
           <td><a href="update.php?CEDULA=<?php echo $fila['CEDULA']; ?>"  class="btn__update" >Actualizar</a></td>
          <td><a href="delete.php?CEDULA=<?php echo $fila['CEDULA']; ?>" class="btn__delete">Eliminar</a></td>    
       </tr>
    <?php
   }
    ?>
        </table>   
        </div>         
    </body>
</html>