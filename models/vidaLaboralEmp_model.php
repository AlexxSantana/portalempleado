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
function datoEmpleado($idEmpleado){
	global $conexion;
	$sql = "select employees.emp_no as id, employees.birth_date as nacido, employees.first_name as nombre, employees.last_name as apellido, employees.gender as genero, employees.hire_date as contrato, departments.dept_name as departamento, salaries.salary as salario, titles.title as cargo from employees, dept_emp, departments, salaries, titles WHERE employees.emp_no=dept_emp.emp_no AND dept_emp.dept_no=departments.dept_no AND employees.emp_no=salaries.emp_no AND employees.emp_no=titles.emp_no AND employees.emp_no='$idEmpleado'";
	$stmt=$conexion->prepare($sql);
	$stmt->execute();
	$dato=$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $dato;
}










?>