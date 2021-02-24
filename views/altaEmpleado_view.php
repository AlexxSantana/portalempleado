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
<style>
div#uno{
    position: absolute;
   
}
input[type="text"]{
    position: absolute;
    left: 105%;
}

input[type="date"]{
    position: absolute;
    left: 105%;
}

input[type="number"]{
    position: absolute;
    left: 105%;
}

select{
	position: absolute;
    left: 105%;
}
</style>
<body>
	<h3>Usuario <?php echo $nombreU["first_name"]." ".$nombreU["last_name"];?></h3>
    <h1> Alta de Empleados</h1>
	<div id="uno">
    <form name='datos' action='<?php echo htmlentities($_SERVER["PHP_SELF"]);?>' method='POST'>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" /><br><br>

        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" /><br><br>
		
		 <label for="nacido">Fecha Nacimiento</label>
        <input type="date" name="nacido" /><br><br>
		
		 <label for="genero">Género</label>
        <select name="genero">
		  <option value="0" selected>----</option>
		  <option value="M">Masculino</option>
		  <option value="F" >Femenino</option>
		</select><br><br>
		
		 <label for="contrato">Fecha de contratación</label>
        <input type="date" name="contrato" /><br><br>
		
		<label for="departamento">Departamento</label>
		<select name="departamento">
			<option value="0">--Selecciona un departamento--</option>
			<?php
				//lista de los departamentos
				foreach($listadpt as $lista){
					echo "<option value='".$lista['dept_no']."'>".$lista['dept_name']."</option>";
				}
			?>
		</select><br><br>
		
		<label for="salario">Salario</label>
        <input type="number" name="salario" /><br><br>
		
		<label for="cargo">Cargo</label>
		<select name="cargo">
			<option value="0">--Selecciona un cargo--</option>
			<?php
				//lista de los departamentos
				foreach($listacargo as $lista){
					echo "<option value='".$lista['title']."'>".$lista['title']."</option>";
				}
			?>
		</select><br><br>

        <input type="submit" name="alta" value="Dar Alta"/>
    </form>
	</div>
</body>
</html>


