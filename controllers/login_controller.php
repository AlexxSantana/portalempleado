<meta charset="utf-8" />
<style>
.error{
	color:red;
	position:absolute;
	top:29%;
}
</style>
<?php
//Llamada al modelo, intermediario entre vista y modelo
require_once("models/login_model.php");
	
//Se incia la sesion
session_start();


if(isset($_SESSION["usuario"])){
		session_unset();
		session_destroy();
}

if (isset($_POST) && !empty($_POST)) {
	$user=$_POST["usuario"];
	$contra=$_POST["contra"];
	
	$consulta=validarDatos($user, $contra);
	
	$empleadoPerteneceRH=empleadoRH($user);

		//Si existe el usuario en la bbdd se crea la sesion usuario con el emp_no (id) y redirigirá al menu de empleado de HUman Recur o al menú de empleado normal
		if($consulta!=null){
			$_SESSION["usuario"]=$consulta["emp_no"];
			if($empleadoPerteneceRH!=null){
				header("location: views/menuEHR_view.php"); 
			}else{//Cualquier empleado que no pertenezca a RH Redirigirá al siguiente menú
				header("location: views/menuEN_view.php"); 
			}
		} else{
			echo "<p class='error'>Datos Incorrectos</p>";
		}
}



//Llamada a la vista, intermediario entre vista y modelo
require_once("views/login_view.php");
?>
