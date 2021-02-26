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
	<meta name="author" value="Alex Santana" />
</head>

<style>
.user{
	color:brown;
	font-size:18pt;
}
</style>

<body>
	<h1>Bienvenido <strong class="user"><?php echo $nombreU["first_name"]." ".$nombreU["last_name"];?></strong> - DPTO Recursos Humanos</h1>
	<li><a href="altaEmpleado_view.php">Alta Empleado</a></li>
	<li><a href="altaMasEmpleados_view.php">Alta Masiva de Empleados</a></li>
	<li><a href="modSalario_view.php">Modificar salario</a></li>
	<li><a href="vidaLaboralEmp_view.php">Consultar vida laboral de empleados</a></li>
	<li><a href="">Info Departamentos</a></li>
	<li><a href="">Cambio Departamento</a></li>
	<li><a href="">Nuevo Jefe Departamento</a></li>
	<li><a href="">Baja Empleado</a></li>
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

