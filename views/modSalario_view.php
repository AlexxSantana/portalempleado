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

</style>
<body>

	<h3>Usuario <strong class="user"><?php echo $nombreU["first_name"]." ".$nombreU["last_name"];?></strong></h3>
    <h1> Modificar Salario Empleados</h1>
	<?php
//if (!isset($_POST) || empty($_POST)) {
?>
    <form name='datos' action='<?php echo htmlentities($_SERVER["PHP_SELF"]);?>' method='POST'>
        <label for="empleado">Buscar Empleado (ID)</label>
        <input type="text" name="empleado"  /><br><br>
		
		
		<!--<label for="salario">Salario</label>
        <input type="number" name="salario" required /><br><br>-->
		
        <input type="submit" name="buscar" value="Buscar"/>
		<input type="submit" name="modificar" value="Modificar salario"/>
		<a href="menuEHR_view.php" ><input type="button" value="Volver al menú" class="volver"></a><br><br>
		<label for="salario">Nuevo salrio</label>
        <input type="number" name="salario"  class="mueve" /><br><br>
		
		
    </form>
	
	<?php
	//} else{
	
			
			
			//if (isset($_POST) && !empty($_POST)) {
			if(isset($_POST["buscar"]) || isset($_POST["modificar"])){
			
				$emple=$_POST["empleado"];
				$salario=$_POST["salario"];
				//Se obitene la funcion listaEmpleados y se guarda en una varable $empleado pasando el parámettro de emple que introduce el trabajdor en la caja de text
				$empleado=listaEmpleados($emple);
			
			
			
				//Al insertar un dato existe en la tabla employees (emp_no) obtendremos en formato tabla los detalles de dicho empleado
				if(!isset($_POST["empleado"])!= $empleado){
					//se obtiene en formato tabla el detalle del empleado que se ha buscado
					detalleEmpleado($empleado);
				}else{//si al insertar un dato erróneo que no existe en la tabla employees (emp_no) saltará un error
					echo "<p class='error'>No existe el empleado con identidicador:  <strong>".$_POST["empleado"]."</strong></p>";
				}
				
				if(isset($_POST["modificar"])){
					modificarSalario($emple, $salario);
					echo"pas";
				}
				
			}
			/*if(isset($_POST["modificar"]) || isset($_POST["buscar"])){
					modificarSalario($_POST["salario"], $_POST["empleado"]);
					
				}*/
			
			
			
				/*if(isset($_POST["modificar"])){
					modificarSalario($_POST["salario"], $_POST["empleado"]);
					echo "BUAH";
				}*/
		//}
				
		?>
	
	
</body>
</html>



