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
	
	//si no existe la sesion["bandejaempleados"] se creará una nueva con un array, dónde se almacenara cada uno de los datos que se recogen del formulario
	if(!isset($_SESSION["bandejaempleados"])){
		$_SESSION["bandejaempleados"]=array(array($nacido, $nombre, $apellido, $genero, $contrato, $depa, $salario, $cargo));
		echo "<p class='exito'>Empleado agregado a a lista, en espera de agregarlo..</p>";
	}else{//si ya existe la sesion["bandejaempleados"] (ya tiene al menos 1 valor), se agregará al final del último valor agregado los siguientes y siguientes...
		array_push($_SESSION["bandejaempleados"],array($nacido, $nombre, $apellido, $genero, $contrato, $depa, $salario, $cargo));
		echo "<p class='exito'>Empleado agregado a a lista, en espera de agregarlo..</p>";
	}
		
}

//Variable para usarla en la view y mostrar los datos de los empleados almacenados en la sesion["bandejaempleados"]
$listaempleados = $_SESSION["bandejaempleados"];
	
//si se hace click en el botón vaciar se vaciará la sesion["bandejaempleados"]
if(isset($_POST["vaciar"])){
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
                </tr>";

        foreach($_SESSION["bandejaempleados"] as $value){
            echo "<tr>";
            echo "<td> ".$value[1]. "</td>";
            echo "<td>".$value[2]."</td>";	
			echo "<td>".$value[0]."</td>";
			echo "<td>".$value[3]."</td>";
			echo "<td>".$value[4]."</td>";
			echo "<td>".$value[5]."</td>";
			echo "<td>".$value[6]."</td>";
			echo "<td>".$value[7]."</td>";	
            echo "</tr>";
        }
        echo "</table>";
}


?>