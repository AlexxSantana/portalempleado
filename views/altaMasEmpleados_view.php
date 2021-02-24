<?php
require_once("../db/db.php");
include_once("../controllers/altaMasEmpleados_controller.php");

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
    left: 12%;
}

input[type="date"]{
    position: absolute;
    left: 12%;
}

input[type="number"]{
    position: absolute;
    left: 12%;
}

select{
	position: absolute;
    left: 12%;
}

.user{
	color:brown;
	font-size:18pt;
}

table {border-collapse: collapse;
	margin:0 auto;
		}
	th, td {border: 1px solid #dddddd;
			width:auto;
			text-align:center;}
.tit{
	position:relative;
	left:45%;
	
}

.mover{
	position:relative;
	left:45%;
}

.error{
	color:red;
	position:absolute;
	top:64%;
}
</style>
<body>
	<h3>Usuario <strong class="user"><?php echo $nombreU["first_name"]." ".$nombreU["last_name"];?></strong></h3>
    <h1> Alta de Empleados</h1>
	<!--<div id="uno">-->
    <form name='datos' action='<?php echo htmlentities($_SERVER["PHP_SELF"]);?>' method='POST'>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre"  /><br><br>

        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" /><br><br>
		
		 <label for="nacido">Fecha Nacimiento</label>
        <input type="date" name="nacido"  /><br><br>
		
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

        <input type="submit" name="agregar" value="Agregar empleado"/>
		<a href="menuEHR_view.php" ><input type="button" value="Volver al menú" class="volver"></a>
		<input type="submit" name="ver" value="Ver empleados"/>
    </form>
	<?php
		if(isset($_POST["ver"])){
			if(!empty($_SESSION["bandejaempleados"])){
				tablaEmpleados($listaempleados);
				echo "<form action='' method='post'>";
					echo '<input class="mover" type="submit" name="vaciar" value="Eliminar registros">';
				echo "</form>";
			} else{
				echo "<p class='error'>No se ha agregado a ningún empleado a la lista<p>";
			}
		}
	?>
	<!--</div>-->
	
</body>
</html>



