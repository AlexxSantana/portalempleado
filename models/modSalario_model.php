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


# Función 'listaProductos'. 
# Parámetros: 
# 	
# Funcionalidad: Se prepara una consulta sql del productName y que la quantityInStock sea superior a 0
# 
# Return: lista de los productos
#
# Alex Santana
function listaEmpleados($idEmpleado){
	global $conexion;
	$sql = "select employees.emp_no as idemp, employees.birth_date as nacido, employees.first_name as nombre, employees.last_name as apellido, employees.gender as genero, employees.hire_date as contrato, salaries.salary as salario from employees, salaries WHERE employees.emp_no=salaries.emp_no AND employees.emp_no='$idEmpleado'";
	$stmt=$conexion->prepare($sql);
	$stmt->execute();
	$listaemp=$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $listaemp;
}

# Función 'listaProductos'. 
# Parámetros: 
# 	
# Funcionalidad: Se prepara una consulta sql del productName y que la quantityInStock sea superior a 0
# 
# Return: lista de los productos
#
# Alex Santana
function modificarSalario($salario, $idEmpleado){
	global $conexion;
	//$sql = "UPDATE salaries SET salary='$salario' WHERE emp_no='$idEmpleado'";
	//$stmt=$conexion->prepare($sql);
	//$stmt->execute($sql);
	//$listaemp=$stmt->fetchAll(PDO::FETCH_ASSOC);
	//return $listaemp;
	//execute($sql);
	//Ejecutar la consulta
	//$resultados=mysqli_query($conexion, $sql);
	//return $resultados;
	$updateSalario = $conexion->prepare("UPDATE salaries SET salary=:salario WHERE emp_no=:idEmpleado");	
	$updateSalario->bindParam(":salario", $salario);
	$updateSalario->bindParam(":idEmpleado", $idEmpleado);
	$updateSalario->execute();
}







?>