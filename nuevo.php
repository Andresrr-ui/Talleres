<?php 
	include_once 'conexion.php';
	if(isset($_POST['guardar'])){
		$cedula=$_POST['cedula'];
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$correo=$_POST['correo'];
		$edad=$_POST['edad'];
		
		if(!empty($cedula) && !empty($nombre) && !empty($apellido) && !empty($correo) && !empty($edad) ){
			if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$cons=$con->prepare('INSERT INTO Personas (Cedula, Nombre, Apellido, Correo, Edad) VALUES(:cedula,:nombre,:apellido,:correo,:edad)');
				$cons->execute(array(
					':cedula' =>$cedula,
					':nombre' =>$nombre,
					':apellido' =>$apellido,
					':correo' =>$correo,
					':edad' =>$edad
				));
				header('Location: index.php');
			}
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Nueva</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="cedula" placeholder="Cedula" class="input__text">
				<input type="text" name="nombre" placeholder="nombre" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="apellido" placeholder="Apellido" class="input__text">
				<input type="text" name="correo" placeholder="Correo" class="input__text">
				<input type="text" name="edad" placeholder="Edad" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>