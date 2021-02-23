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
function validarDatos($usuario, $contra){
	global $conexion;
	$sql="SELECT emp_no, last_name FROM employees WHERE emp_no='$usuario' AND last_name='$contra'";
	$stmt=$conexion->prepare($sql);
	$stmt->execute();
	$usuarios=$stmt->fetchAll(PDO::FETCH_ASSOC);
	
	if($usuarios!==null){
		for($i=0; $i<count($usuarios); $i++){
			if($usuarios[$i]["last_name"]==$contra){
					return $usuarios[$i];
				}
		}
		//return null;
	} /*else{
		return null;
	}*/
	//return $usuarios;
	
	
	
}

# Función 'listaProductos'. 
# Parámetros: 
# 	
# Funcionalidad: Se prepara una consulta sql del productName y que la quantityInStock sea superior a 0
# 
# Return: lista de los productos
#
# Alex Santana
function empleadoRH($usuario){
	global $conexion;
	$sql2="SELECT employees.emp_no, employees.last_name, departments.dept_name FROM employees, dept_emp, departments WHERE dept_emp.emp_no='$usuario' AND dept_emp.dept_no=departments.dept_no AND departments.dept_name='Human Resources'";
	$stmt=$conexion->prepare($sql2);
	$stmt->execute();
	$total=$stmt->fetchColumn();
	return $total;
}



?>