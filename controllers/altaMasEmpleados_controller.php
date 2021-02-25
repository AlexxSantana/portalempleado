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

.total{

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
}else{//si existe la sesion de usuario, es decir esta logeado, se obtendrán las siguientes variables para poder hacer uso de ellas en la vista y poder mostrar el nombre+apellido del empleaod que este logeado en ese momento
		$idUser=$_SESSION["usuario"];
		$nombreU=obtenerNombre($idUser);
	}

//Si se ha iniciado sesión se lista los siguientes elementos
if(!empty($_SESSION["usuario"])){
	
	$listadpt=listaDepa();
	$listacargo=listaCargo();
}

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
	
	//si no existe la sesion["bandejaempleados"] se creará una nueva con un array asociativo, dónde se almacenara cada uno de los datos que se recogen del formulario
	if(!isset($_SESSION["bandejaempleados"])){
		$_SESSION["bandejaempleados"]=array(array("fechnac" => $nacido,
													"nombre"=> $nombre, 
													"apellido" => $apellido,
													"genero" => $genero,
													"contrato" => $contrato,
													"depar" => $depa,
													"salario" => $salario,
													"cargo" => $cargo));
		echo "<p class='exito'>Empleado agregado a a lista, en espera de agregarlo..</p>";
	}else{//si ya existe la sesion["bandejaempleados"] (ya tiene al menos 1 valor), se agregará al final del último valor agregado los siguientes y siguientes...(array asociativo)
		array_push($_SESSION["bandejaempleados"],array("fechnac" => $nacido,
													"nombre"=> $nombre, 
													"apellido" => $apellido,
													"genero" => $genero,
													"contrato" => $contrato,
													"depar" => $depa,
													"salario" => $salario,
													"cargo" => $cargo));
		echo "<p class='exito'>Empleado agregado a a lista, en espera de agregarlo..</p>";
	}
		
}


//Variable para usarla en la view y mostrar los datos de los empleados almacenados en la sesion["bandejaempleados"]
//$listaempleados = $_SESSION["bandejaempleados"];

	
//si se hace click en el botón vaciar se vaciará la sesion["bandejaempleados"]
if(isset($_POST["vaciar"])){
	$_SESSION["bandejaempleados"]=array();
	//session_unset($_SESSION["bandejaempleados"]);
}

//Opción para poder eliminar a algún empleado sin tener que vacíar toda la sesion[bandejaempleados]
if(isset($_REQUEST["item"])){
	$empleado=$_REQUEST["item"];
	unset($_SESSION["bandejaempleados"][$empleado]);
}
	
//Al hacer click en el boton de alta (alta masiva empleados), accederemos a la sesion[bandejaempleados] dónde estarán almacenados los empleados que se hayan agregado anteriormente, se accederá por el valor de cada elemento en el array asociativo 
if(isset($_POST["alta"])){
	foreach($_SESSION["bandejaempleados"] as $value){
		altaEmpleado($value["fechnac"], $value["nombre"], $value["apellido"], $value["genero"], $value["contrato"], $value["depar"], $value["salario"], $value["cargo"]);
		
	}
	echo "<p class='exito'>Alta masiva de empleados completa</p>";
	//se vacia el la bandejaempleados
	$_SESSION["bandejaempleados"]=array();
}

//Llamada a la vista, intermediario entre vista y modelo
require_once("../views/altaMasEmpleados_view.php");

	
//------------------------------------FUNCIONES----------------------------------//


# Función 'tablaEmpleados'. 
# Parámetros: 
# 	
# Funcionalidad: Obtener en formato tabla, el productName de producto y la cantidad que se haya seleccionado desde el select 
# 
# Return: 
#
# Alex Santana
function tablaEmpleados($listaempleados){
		$total=0;
        echo "<strong class='tit'>Detalle Empleados</strong>
            <table> 
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
					<th>Fecha nacimiento</th>
					<th>Género</th>
					<th>Fecha contrato</th>
					<th>Departamento</th>
					<th>Salario</th>
					<th>Cargo</th>
					<th></th>
                </tr>";

        foreach($_SESSION["bandejaempleados"] as $value => $arra){
            echo "<tr>";
            echo "<td> ".$arra["nombre"]. "</td>";
            echo "<td>".$arra["apellido"]."</td>";	
			echo "<td>".$arra["fechnac"]."</td>";
			echo "<td>".$arra["genero"]."</td>";
			echo "<td>".$arra["contrato"]."</td>";
			echo "<td>".$arra["depar"]."</td>";
			echo "<td>".$arra["salario"]."</td>";
			echo "<td>".$arra["cargo"]."</td>";
			echo "<td>"."<a href='../views/altaMasEmpleados_view.php?item=$value'>Eliminar</a>"."</td>";
            echo "</tr>";
			$total=$value+1;
        }
        echo "</table>";
		echo "<strong class='total'>Total: ".$total."</strong>";
}


?>