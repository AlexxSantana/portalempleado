<meta charset="utf-8" />
<style>
.error{
	color:red;
	position:absolute;
	top:39%;
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
require_once("../models/jefeDepartamento_model.php");
	
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
		
		//
		
		if(isset($_POST["nuevo"])){
			$idemp=$_POST["empleado"];
			$iddepa=$_POST["departamento"];
			$fcontrato=$_POST["contrato"];
			$ffin=$_POST["ffin"];
			
			asignarJefe($idemp, $iddepa, $fcontrato, $ffin);
			
		}
	}



//Llamada a la vista, intermediario entre vista y modelo
require_once("../views/jefeDepartamento_view.php");

	
	
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
	if(isset($_POST["cambiar"])){
		$nombre=obtenerNombre2($_POST["empleado"]);
	}
	
	echo "<strong class='tit'>DATOS DE: <b class='a'>$nombre</b></strong>
            <table> 
                <tr>
                    <th>ID emp</th>
                    <th>Nacido</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Género</th>
					<th>Fecha contrato</th>
					<th>Departamento</th>
					<th>ID departamento</th>
                </tr>";

        foreach($consultaemp as $value => $fila){
				echo "<tr>";
				echo "<td> ".$fila["id"]. "</td>";
				echo "<td>".$fila["nacido"]."</td>";	
				echo "<td>".$fila["nombre"]."</td>";
				echo "<td>".$fila["apellido"]."</td>";
				echo "<td>".$fila["genero"]."</td>";
				echo "<td>".$fila["contrato"]."</td>";
				echo "<td>".$fila["departamento"]."</td>";
				echo "<td>".$fila["iddepa"]."</td>";
				echo "</tr>";
        }
        echo "</table>";
		return $fila["departamento"]; 
}

?>