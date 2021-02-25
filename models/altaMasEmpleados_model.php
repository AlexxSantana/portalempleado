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
function listaCargo(){
	global $conexion;
	$sql="SELECT distinct title FROM titles";
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
function obteneridEmpleado(){
	global $conexion;
	$newOrder="SELECT max(emp_no) as mayor FROM employees";
	$stmt=$conexion->prepare($newOrder);
	$stmt->execute();
	$totalOrder=$stmt->fetchAll(PDO::FETCH_ASSOC);
	foreach($totalOrder as $order){
		$orderNew=$order["mayor"]+1;
	}
	return $orderNew;
}

# Función 'listaProductos'. 
# Parámetros: 
# 	
# Funcionalidad: Se prepara una consulta sql del productName y que la quantityInStock sea superior a 0
# 
# Return: lista de los productos
#
# Alex Santana
function altaEmpleado($fechNac, $nombre, $apellido, $genero, $fechContrato, $iddepa, $salario, $cargo){
	global $conexion;
	//se obtiene el nuevo id (emp_no)
	$newidemp=obteneridEmpleado();
	
	
	//Insertar datos en la tabla employees
	$sqlOrder="INSERT INTO employees values('$newidemp','$fechNac','$nombre','$apellido', '$genero', '$fechContrato')";
	$conexion->exec($sqlOrder);
	
	//se obtiene el dept_no para poder relacionar la tabla departments con dept_emp
	$departamento="SELECT dept_no from departments WHERE dept_no='$iddepa'";
	$stmt=$conexion->prepare($departamento);
	$stmt->execute();
	$depa=$stmt->fetchColumn();
	
	
	//Se inserta los datos de $newidemp, $depa(obtenido en la anterior senntencia sql) y la $fechContrato que se pase desde el formulario
	$newdept_emp="INSERT INTO dept_emp values('$newidemp', '$depa', '$fechContrato', '9999-01-01')";
	$conexion->exec($newdept_emp);
	
	
	//Se inserta los datos de $newidemp, el $salario que se pase a través del formulario y $fechContrato 
	$tablesalaries="INSERT INTO salaries values('$newidemp', '$salario', '$fechContrato', '9999-01-01')";
	$conexion->exec($tablesalaries);
	
	//Se inserta los datos de $newidemp, el $cargo que se pasa a través del formulario y la $fechContrato
	$tabletitles="INSERT INTO titles values('$newidemp', '$cargo', '$fechContrato', '9999-01-01')";
	$conexion->exec($tabletitles);
	
	//Se insertan los datos de $newidemp, $depa, y $fechContrato
	$tabledept_manager="INSERT INTO dept_manager values('$newidemp', '$depa', '$fechContrato', '9999-01-01')";
	$conexion->exec($tabledept_manager);
}

?>