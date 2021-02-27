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
function depaEmpleado($idemp){
	global $conexion;
	$sql = "select employees.emp_no as id, birth_date as nacido, first_name as nombre, last_name as apellido, gender as genero, hire_date as contrato, departments.dept_name as departamento, dept_emp.dept_no as iddepa from employees, dept_emp, departments WHERE employees.emp_no=dept_emp.emp_no AND dept_emp.dept_no=departments.dept_no AND employees.emp_no='$idemp'";
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
function cambioDepa($ideemp, $iddepa){
	global $conexion;
	$sql="UPDATE employees, dept_emp SET dept_no='$iddepa' WHERE dept_emp.emp_no='$ideemp'";
	$stmt=$conexion->prepare($sql);
	$stmt->execute();
}










?>