<?php
	include_once 'conexion.php';

	if(isset($_GET['CEDULA'])){
		$CEDULA=(int) $_GET['CEDULA'];

		$buscar_CEDULA=$con->prepare('SELECT * FROM personas WHERE CEDULA=:CEDULA LIMIT 1');
		$buscar_CEDULA->execute(array(
			':CEDULA'=>$CEDULA
		));
		$resultado=$buscar_CEDULA->fetch();
	}else{
		header('Location: index.php');
	}


	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$correo=$_POST['correo'];
		$edad=$_POST['edad'];

		if(!empty($nombre) && !empty($apellido) && !empty($correo) && !empty($edad) ){
			if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_update=$con->prepare(' UPDATE personas SET  
					nombre=:nombre,
					apellido=:apellido,
					correo=:correo,
					edad=:edad
					WHERE CEDULA=:CEDULA;'
				);
				$consulta_update->execute(array(
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
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Actualizar persona</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<form action="" method="post">
			<div class="form-group">
				<label>Nombre</label>
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['NOMBRE']; ?>" class="input__text">
				<label>Apellido</label>
				<input type="text" name="apellido" value="<?php if($resultado) echo $resultado['APELLIDO']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<label>Correo</label>
				<input type="text" name="correo" value="<?php if($resultado) echo $resultado['CORREO']; ?>" class="input__text">
				<label>Edad</label>
				<input type="text" name="edad" value="<?php if($resultado) echo $resultado['EDAD']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>