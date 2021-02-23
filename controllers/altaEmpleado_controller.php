<meta charset="utf-8" />
<style>
.error{
	color:red;
	position:absolute;
	top:39%;
}
</style>
<?php
//Llamada al modelo, intermediario entre vista y modelo
require_once("../models/altaEmpleado_model.php");
	
//Se incia la sesion
session_start();

/*if(isset($_SESSION["usuario"])){
		session_unset();
		session_destroy();
}*/

if(!empty($_SESSION["usuario"])){
	$listadpt=listaDepa();
}

if (isset($_POST["alta"])){
	echo "Hola";
}

//Llamada a la vista, intermediario entre vista y modelo
require_once("../views/altaEmpleado_view.php");
?>