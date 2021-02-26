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

.a{
	color:green;
	font-size:17pt;
}
</style>
<?php
//Llamada al modelo, intermediario entre vista y modelo
require_once("../models/infoDepartamento_model.php");
	
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
		//Se obtiene la instrucción sql declarada en el model
		$listadpt=listaDepa();
		//Al hacer click en consultar empleados se obtendrá en formato tabla la lista de empleados que trabaja en ese departamento y que sigan trabajando acuatlmente
		if(isset($_POST["consultar"])){
			$iddepar=$_POST["departamento"];
			$consultaemp=datoEmpleados($iddepar);
			
		}
		//al hacerl cick en el boton consultar jefes se procederá a visualizar la tabla de ese departamento con sus respectivos jefes de departamentos y que sigan trabajando acuatlmente
		if(isset($_POST["consultar2"])){
			$iddepar=$_POST["departamento"];
			$consultaemp2=datoEmpJefes($iddepar);
			
		}
		
	}



//Llamada a la vista, intermediario entre vista y modelo
require_once("../views/infoDepartamento_view.php");

	
	
//------------------------------------FUNCIONES----------------------------------//

# Función 'listaProductos'. 
# Parámetros: 
# 	
# Funcionalidad: Se prepara una consulta sql del productName y que la quantityInStock sea superior a 0
# 
# Return: lista de los productos
#
# Alex Santana
function detalleEmpleado($consultaemp){
	//Obtengo el nombre del empleado que se ha buscado para poder mostrarlo en la cabecera de la tabla
	if(isset($_POST["consultar"])){
		$nombre=listaDepa2($_POST["departamento"]);
		echo "<strong class='tit'>DEPARTAMENTO <b class='a'>$nombre</b></strong>";
	}
	
	if(isset($_POST["consultar2"])){
		$nombre=listaDepa2($_POST["departamento"]);
		echo "<strong class='tit'>DEPARTAMENTO <b class='a'>$nombre</b></strong>";
	}
	
	echo "
            <table> 
                <tr>
                    <th>Departamento</th>
                    <th>ID Emp</th>
					<th>Fecha nacimiento</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Género</th>
					<th>Fecha contrato</th>
					<th>Cargo</th>
					<th>Fecha expiración</th>
                </tr>";

        foreach($consultaemp as $value => $fila){
				echo "<tr>";
				echo "<td> ".$fila["departamento"]. "</td>";
				echo "<td>".$fila["id"]."</td>";	
				echo "<td>".$fila["nacido"]."</td>";
				echo "<td>".$fila["nombre"]."</td>";
				echo "<td>".$fila["apellido"]."</td>";
				echo "<td>".$fila["genero"]."</td>";
				echo "<td>".$fila["contrato"]."</td>";
				echo "<td>".$fila["cargo"]."</td>";
				echo "<td>".$fila["expiracion"]."</td>";
				echo "</tr>";
        }
        echo "</table>";
		
}

?>