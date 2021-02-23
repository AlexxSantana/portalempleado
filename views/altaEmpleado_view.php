<?php
require_once("../db/db.php");
include_once("../controllers/altaEmpleado_controller.php");


//Si empleado no existe, es decir no esta logeado, volverá al index.php para logearse y no se podrá ver la info de esta pag hasta que se logee correctamente
if(!isset($_SESSION["usuario"])){
		header("location: ../index.php");
		session_destroy();
}else{
		$idUser=$_SESSION["usuario"];
		$nombreU=obtenerNombre($idUser);
	}

?>

<!DOCTYPE html>
<html lang="ES">

<head>
    <title>Alta de empleados</title>
    <meta charset="utf-8" />
    <meta name="author" value="Lucas Fadavi"/>
</head>

<body>
	<h3>Usuario <?php echo $nombreU["first_name"]." ".$nombreU["last_name"];?></h3>
    <h1> Alta de Empleados</h1>
    <form name='datos' action='<?php echo htmlentities($_SERVER["PHP_SELF"]);?>' method='POST'>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" /><br><br>

        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" /><br><br>
		
		 <label for="nacido">Fecha Nacimiento</label>
        <input type="text" name="nacido" /><br><br>
		
		 <label for="genero">Género</label>
        <select name="genero">
		  <option value="0" selected>----</option>
		  <option value="M">Masculino</option>
		  <option value="F" >Femenino</option>
		</select><br><br>
		
		 <label for="contrato">Fecha de contratación</label>
        <input type="text" name="contrato" /><br><br>
		
		<select name="departamento">
			<option value="0">--Selecciona un departamento--</option>
			<?php
				//lista de los departamentos
				foreach($listadpt as $lista){
					echo "<option value='".$lista['dept_no']."'>".$lista['dept_name']."</option>";
				}
			?>
		</select><br><br>

        <input type="submit" name="alta" value="Dar Alta"/>
    </form>
</body>
</html>

<?php
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
?>

