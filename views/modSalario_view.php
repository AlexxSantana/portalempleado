<?php
require_once("../db/db.php");
include_once("../controllers/modSalario_controller.php");

?>

<!DOCTYPE html>
<html lang="ES">

<head>
    <title>Alta de empleados</title>
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

.mover1{
	position:absolute;
	left:72%;
	top:44%;
}
#contenedor{
	position:relative;
	right:25%;
	//margin:0 auto;
}

.mueve{
	position:relative;
	top:27.7%;
	margin-left:-61%;
}

.exito{
	color:blue;
	position:relative;
	top: 0 auto;
}

</style>
<body>

	<h3>Usuario <strong class="user"><?php echo $nombreU["first_name"]." ".$nombreU["last_name"];?></strong></h3>
    <h1> Modificar Salario Empleados</h1>

    <form name='datos' action='<?php echo htmlentities($_SERVER["PHP_SELF"]);?>' method='POST'>
        <label for="empleado">Buscar Empleado (ID)</label>
        <input type="text" name="empleado"  /><br><br>
		
		
		<!--<label for="salario">Salario</label>
        <input type="number" name="salario" required /><br><br>-->
		
        <!--<input type="submit" name="buscar" value="Buscar"/>-->
		<input type="submit" name="modificar" value="Modificar salario"/>
		<a href="menuEHR_view.php" ><input type="button" value="Volver al menú" class="volver"></a><br><br>
		<label for="salario">Nuevo salario</label>
        <input type="number" name="salario"  class="mueve" /><br><br>
		
		<?php
		if (isset($_POST["modificar"])) {
			if(!empty($_POST["empleado"]) && !empty($_POST["salario"])){
				$nuevosalario=$_POST["salario"];
				$idemp=$_POST["empleado"];
				modificarSalario($idemp, $nuevosalario);
				$empleado=listaEmpleados($idemp);
				$nombre=detalleEmpleado($empleado);
				echo "<p class='exito'>Se ha modificado correctamente el salario de <strong>$nombre</strong></p>";
			} else{
				echo "<p class='error'>Campo ID y salario vacíos</p>";
			}
			
		}
				
		?>
		
    </form>
	
	
	
	
</body>
</html>



