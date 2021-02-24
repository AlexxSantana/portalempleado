<meta charset="utf-8" />
<style>
.error{
	color:red;
	position:absolute;
	top:39%;
}

.exito{
	color:blue;
	position:absolute;
	top:65%;
}

</style>
<?php
//Llamada al modelo, intermediario entre vista y modelo
require_once("../models/altaMasEmpleados_model.php");
	
//Se incia la sesion
session_start();

/*if(isset($_SESSION["usuario"])){
		session_unset();
		session_destroy();
}*/

//Si empleado no existe, es decir no esta logeado, volverá al index.php para logearse y no se podrá ver la info de esta pag hasta que se logee correctamente
if(!isset($_SESSION["usuario"])){
		header("location: ../index.php");
		//session_destroy();
}else{
		$idUser=$_SESSION["usuario"];
		$nombreU=obtenerNombre($idUser);
	}

//	
if(!empty($_SESSION["usuario"])){
	
	$listadpt=listaDepa();
	$listacargo=listaCargo();
}


//




//si se hace click en el botón de dar Alta se insertarán los datos
if (isset($_POST["agregar"])){
	//Se obtiene los valores del formulario (altaEmpleado_view.php)
	$nacido=$_POST["nacido"];
	$nombre=$_POST["nombre"];
	$apellido=$_POST["apellido"];
	$genero=$_POST["genero"];
	$contrato=$_POST["contrato"];
	$depa=$_POST["departamento"];
	$salario=$_POST["salario"];
	$cargo=$_POST["cargo"];
	//Insertar datos en la tabla employees
	/*altaEmpleado($nacido, $nombre, $apellido, $genero, $contrato, $depa, $salario, $cargo);*/
	//echo "<p class='exito'>Se ha dado de alta un/a nuevo empleado/a</p>";
	if(!isset($_SESSION["bandejaempleados"])){
		$_SESSION["bandejaempleados"]=array(array($nacido, $nombre, $apellido, $genero, $contrato, $depa, $salario, $cargo));
	}else{
		array_push($_SESSION["bandejaempleados"],array($nacido, $nombre, $apellido, $genero, $contrato, $depa, $salario, $cargo));
	}
	//var_dump($_SESSION["bandejaempleados"]);
	
	
}

if(isset($_POST["ver"])){
		//var_dump($_SESSION["bandejaempleados"]);
		//echo $_SESSION["bandejaempleados"][0];
		$listado = $_SESSION["bandejaempleados"];

		foreach ($listado as $value) {
		   echo "<tr><td>" . $value[0] . "</td><td>" . $value[1] .$value[2] .$value[3] .$value[4] .$value[5] .$value[6] .$value[7] . "</td></tr>";
		}
	}

//Llamada a la vista, intermediario entre vista y modelo
require_once("../views/altaMasEmpleados_view.php");
?>