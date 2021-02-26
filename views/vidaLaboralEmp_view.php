<?php
require_once("../db/db.php");
include_once("../controllers/vidaLaboralEmp_controller.php");

?>

<!DOCTYPE html>
<html lang="ES">

<head>
    <title>Consulta de vida laboral</title>
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

</style>
<body>

	<h3>Usuario <strong class="user"><?php echo $nombreU["first_name"]." ".$nombreU["last_name"];?></strong></h3>
    <h1> Consulta de vida laboral</h1>
	<?php
//if (!isset($_POST) || empty($_POST)) {
?>
    <form name='datos' action='<?php echo htmlentities($_SERVER["PHP_SELF"]);?>' method='POST'>
        <label for="empleado">Buscar Empleado (ID)</label>
        <input type="text" name="empleado"  /><br><br>
		
        <input type="submit" name="buscar" value="Buscar" />
		<a href="menuEHR_view.php" ><input type="button" value="Volver al menú" class="volver">
    </form>
	
	<?php
		if(isset($_POST["buscar"])){
			//Si el id que se inserta existe en la tabla employees se mostrará los datos de dicho empleado en formato tabla
			if(!isset($_POST["empleado"])!= $consultaemp){
				$tablaEmpleado=detalleEmpleado($consultaemp);
			}else{//Si no existe generará el siguiente error
				echo "<p class='error'>No existe el empleado con identidicador:  <strong>".$_POST["empleado"]."</strong></p>";
			}
			
		}
	?>
	
	
	
</body>
</html>



