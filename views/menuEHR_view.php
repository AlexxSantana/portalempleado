<?php
//Se inicia la sesión
session_start();
//Si empleado no existe, es decir no esta logeado, volverá al index.php para logearse y no se podrá ver la info de esta pag hasta que se logee correctamente
if(!isset($_SESSION["usuario"])){
		header("location: ../index.php");
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
	<h1>Bienvenido Empleado - Perteneces a Recursos Humanos<!--<?php echo htmlspecialchars($_COOKIE["user"]) ?>--></h1>
	<li><a href="">Alta Empleado</a></li>
	<li><a href="">Alta Masiva de Empleados</a></li>
	<li><a href="">Modificar salario</a></li>
	<li><a href="">Vida Laboral</a></li>
	<li><a href="">Info Departamentos</a></li>
	<li><a href="">Cambio Departamento</a></li>
	<li><a href="">Nuevo Jefe Departamento</a></li>
	<li><a href="">Baja Empleado</a></li>
</body>
</html>

