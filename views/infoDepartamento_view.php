<?php
require_once("../db/db.php");
include_once("../controllers/infoDepartamento_controller.php");

?>

<!DOCTYPE html>
<html lang="ES">

<head>
    <title>Información departamentos</title>
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
    <h1> Consulta departamentos</h1>

    <form name='datos' action='<?php echo htmlentities($_SERVER["PHP_SELF"]);?>' method='POST'>
        <label for="departamento">Seleccionar departamento</label>
		<select name="departamento">
			<option value="0">--Selecciona un departamento--</option>
			<?php
				//lista de los departamentos
				foreach($listadpt as $lista){
					echo "<option value='".$lista['dept_no']."'>".$lista['dept_name']."</option>";
				}
			?>
		</select><br><br>
		
        <input type="submit" name="consultar" value="Consultar empleados" />
		<input type="submit" name="consultar2" value="Consultar jefes" />
		<a href="menuEHR_view.php" ><input type="button" value="Volver al menú" class="volver"></a>
    </form>
	
	<?php
		//Demás empleados
		if(isset($_POST["consultar"])){
			//Si se selecciona un departamento de la lista se visualizará la tabla de ese departamento con sus respectivos empleados y datos - salario no añadido
			if(!empty($_POST["departamento"][0])){
			detalleEmpleado($consultaemp);
			} else {//si no se selecciona ningún departamento devolverá el sgiuente error
				echo "<p class='error'>Debes seleccionar un departamento</p>";
				}
		}
		//Empleados jefes departamentos
		if(isset($_POST["consultar2"])){
			if(!empty($_POST["departamento"][0])){
				detalleEmpleado($consultaemp2);
			} else{
				echo "<p class='error'>Debes seleccionar un departamento</p>";
				}
		}
		
	?>
	
	
	
</body>
</html>



