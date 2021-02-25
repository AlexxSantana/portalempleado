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
require_once("../models/modSalario_model.php");
	
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

//Al hacer click en el boton buscar.
/*if(isset($_POST["buscar"])){
	$emple=$_POST["empleado"];
	//$salario=$_POST["salario"];
	//Se obitene la funcion listaEmpleados y se guarda en una varable $empleado pasando el parámettro de emple que introduce el trabajdor en la caja de text
	$empleado=listaEmpleados($emple);

} */




//Llamada a la vista, intermediario entre vista y modelo
require_once("../views/modSalario_view.php");

	
//------------------------------------FUNCIONES----------------------------------//

# Función 'listaProductos'. 
# Parámetros: 
# 	
# Funcionalidad: Se prepara una consulta sql del productName y que la quantityInStock sea superior a 0
# 
# Return: lista de los productos
#
# Alex Santana
function detalleEmpleado($empleado){
	echo "<strong class='tit'>Detalle Empleados</strong>
            <table> 
                <tr>
                    <th>ID</th>
                    <th>Fecha nacimiento</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Género</th>
					<th>Contrato</th>
					<th>Salario</th>
                </tr>";

        foreach($empleado as $value => $fila){
				echo "<tr>";
				echo "<td> ".$fila["idemp"]. "</td>";
				echo "<td>".$fila["nacido"]."</td>";	
				echo "<td>".$fila["nombre"]."</td>";
				echo "<td>".$fila["apellido"]."</td>";
				echo "<td>".$fila["genero"]."</td>";
				echo "<td>".$fila["contrato"]."</td>";
				echo "<td>".$fila["salario"]."</td>";
				echo "</tr>";
			//return $fila["idemp"];
        }
        echo "</table>";
	
}

?>