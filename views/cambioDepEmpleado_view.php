<?php
require_once("../db/db.php");
include_once("../controllers/cambioDepEmpleado_controller.php");

?>

<!DOCTYPE html>
<html lang="ES">

<head>
    <title>Cambio departamentos</title>
    <meta charset="utf-8" />
    <meta name="author" value="Alex Santana"/>
</head>
<style>
div#uno{
    position: absolute;
   
}
input[type="text"]{
    position: absolute;
    left: 12%;
	}
	input[type="number"]{
    position: absolute;
    left: 70%;
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
			text-align:center;
			}
.tit{
	position:relative;
	left:45%;
}

.error{
	color:red;
	position:relative;
	top: auto;
}	

.exito{
	color:blue;
	position:relative;
	top:0 auto;
}

</style>
<body>

	<h3>Usuario <strong class="user"><?php echo $nombreU["first_name"]." ".$nombreU["last_name"];?></strong></h3>
    <h1> Cambio Departamento</h1>

    <form name='datos' action='<?php echo htmlentities($_SERVER["PHP_SELF"]);?>' method='POST'>
        <label for="empleado">Ingresar ID empleado</label>
		<input type="text" name="empleado"  /><br><br>
		
        <input type="submit" name="cambiar" value="Cambiar Departamento" />
		<a href="menuEHR_view.php" ><input type="button" value="Volver al menú" class="volver"></a><br><br>
		<label for="departamento">Departamento</label>
			<select name="departamento">
				<option value="0">--Selecciona un departamento--</option>
				<?php
				$listadpt=listaDepa();
					//lista de los departamentos
					foreach($listadpt as $lista){
						echo "<option value='".$lista['dept_no']."'>".$lista['dept_name']."</option>";
					}
				?>
			</select><br><br>
			
	</form>
	<?php
		if(isset($_POST["cambiar"])){
			if(!empty($_POST["empleado"]) && !empty($_POST["departamento"][0])){
				$nombredepa=detalleEmpleado($consultaemp);
				echo "<p class='exito'>Empleado <strong>$idemp</strong> asignado al departamento: <strong>$nombredepa</strong></p>";
			}else{
				echo "<p class='error'>Campo/s ID y departamento vacio/s</p>";
			}
		}
		
	?>
	
	
	
</body>
</html>



