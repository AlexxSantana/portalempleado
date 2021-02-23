<meta charset="utf-8" />
<style>
.error{
	color:red;
}
</style>
<?php
//Llamada al modelo, intermediario entre vista y modelo
require_once("models/login_model.php");
	
//Se incia la sesion
session_start();
//Si no existe 

if(isset($_SESSION["usuario"])){
		session_unset();
		session_destroy();
}

if (isset($_POST) && !empty($_POST)) {
	$user=$_POST["usuario"];
	$contra=$_POST["contra"];

	$consulta=validarDatos($user, $contra);
	
	$empleadoPerteneceRH=empleadoRH($user);
	if($empleadoPerteneceRH!=null){
		//Si existe el usuario en la bbdd se crea la sesion usuario con el emp_no (id) y redirigirá al menu de empleado de HUman Recur
		if($consulta!=null){
			$_SESSION["usuario"]=$consulta["emp_no"]; 
			header("location: views/menuEHR_view.php"); 
		} else{
			
			echo "<p class='error'>Datos Incorrectos</p>";
		}
	} else{
		echo "<p>El empleado no pertenece al dp RH</p>";
	}
}

//Llamada a la vista, intermediario entre vista y modelo
require_once("views/login_view.php");
?>