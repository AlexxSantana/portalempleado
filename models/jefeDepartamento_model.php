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
function obtenerNombre($usuario){
	global $conexion;
	$sql="SELECT first_name, last_name FROM employees WHERE emp_no='$usuario'";
	$stmt=$conexion->prepare($sql);
	$stmt->execute();
	$nombre=$stmt->fetch(PDO::FETCH_ASSOC);
	return $nombre;
}


function obtenerNombre2($usuario){
	global $conexion;
	$sql="SELECT first_name, last_name FROM employees WHERE emp_no='$usuario'";
	$stmt=$conexion->prepare($sql);
	$stmt->execute();
	$nombre=$stmt->fetchColumn();
	return $nombre;
}




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

# Función 'listaProductos'. 
# Parámetros: 
# 	
# Funcionalidad: Se prepara una consulta sql del productName y que la quantityInStock sea superior a 0
# 
# Return: lista de los productos
#
# Alex Santana
function asignarJefe($idemp, $iddepa, $fcontrato, $ffin){
	global $conexion;
	$sql="INSERT INTO dept_manager values('$idemp', '$iddepa', '$fcontrato', '$ffin')";
	$conexion->exec($sql);
}









?>