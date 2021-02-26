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


function listaDepa2($iddep){
	global $conexion;
	$sql="SELECT dept_name FROM departments WHERE dept_no='$iddep'";
	$stmt=$conexion->prepare($sql);
	$stmt->execute();
	$listadepa=$stmt->fetchColumn();
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
function datoEmpleados($iddepar){
	global $conexion;
	$sql = "SELECT dept_name as departamento, employees.emp_no as id, employees.birth_date as nacido, employees.first_name as nombre, employees.last_name as apellido, employees.gender as genero, employees.hire_date as contrato, titles.title as cargo, dept_emp.to_date as expiracion FROM departments, dept_emp, employees, titles WHERE departments.dept_no=dept_emp.dept_no AND dept_emp.emp_no=employees.emp_no AND employees.emp_no=titles.emp_no AND departments.dept_no='$iddepar' AND dept_emp.to_date>'2021' GROUP BY nombre";
	$stmt=$conexion->prepare($sql);
	$stmt->execute();
	$dato=$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $dato;
}


# Función 'listaProductos'. 
# Parámetros: 
# 	
# Funcionalidad: Se prepara una consulta sql del productName y que la quantityInStock sea superior a 0
# 
# Return: lista de los productos
#
# Alex Santana
function datoEmpJefes($iddepar){
	global $conexion;
	$sql = "SELECT dept_name as departamento, employees.emp_no as id, employees.birth_date as nacido, employees.first_name as nombre, employees.last_name as apellido, employees.gender as genero, employees.hire_date as contrato, titles.title as cargo, dept_manager.to_date as expiracion FROM departments, employees, titles, dept_manager WHERE dept_manager.dept_no=departments.dept_no AND dept_manager.emp_no=employees.emp_no AND employees.emp_no=titles.emp_no AND departments.dept_no='$iddepar' AND dept_manager.to_date >='2021' ";
	$stmt=$conexion->prepare($sql);
	$stmt->execute();
	$dato=$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $dato;
}








?>