<?php
//Se inicia la sesión
session_start();
//Si empleado no existe, es decir no esta logeado, volverá al index.php para logearse y no se podrá ver la info de esta pag hasta que se logee correctamente
if(!isset($_SESSION["usuario"])){
		header("location: ../index.php");
}else{
		$idUser=$_SESSION["usuario"];
		$nombreU=obtenerNombre($idUser);
	}
	
?>


<!DOCTYPE html>
<html>
<head>
	<title>Portal del Empleado</title>
	<meta charset="utf-8" />
	<meta name="author" value="Lucas Fadavi" />
</head>
<body>
	<h1>Bienvenido <?php echo $nombreU["first_name"]." ".$nombreU["last_name"];?></h1>
	<li><a href="">Mi Nómina</a></li>
	<li><a href="">Historial Laboral</a></li>
	<li><a href="../index.php">Cerrar Sesión</a></li>
</body>
</html>

<?php
# Función 'listaProductos'. 
# Parámetros: 
# 	
# Funcionalidad: Se prepara una consulta sql del productName y que la quantityInStock sea superior a 0
# 
# Return: lista de los productos
#
# Alex Santana
function obtenerNombre($usuario){
	include_once("../db/db.php");
	$sql="SELECT first_name, last_name FROM employees WHERE emp_no='$usuario'";
	$stmt=$conexion->prepare($sql);
	$stmt->execute();
	$nombre=$stmt->fetch(PDO::FETCH_ASSOC);
	return $nombre;
}
?>

