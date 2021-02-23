<?php
//La lógica vendrá aquí, funciones que se comunican con la bbdd
# Función 'listaProductos'. 
# Parámetros: 
# 	
# Funcionalidad: Se prepara una consulta sql del productName y que la quantityInStock sea superior a 0
# 
# Return: lista de los productos
#
# Alex Santana
function listaDepa(){
	global $conexion;
	$sql="SELECT dept_no, dept_name FROM departments";
	$stmt=$conexion->prepare($sql);
	$stmt->execute();
	$listadepa=$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $listadepa;
}
?>