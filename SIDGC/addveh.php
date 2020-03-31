<!DOCTYPE html>
<html lang="es">
<head>
<link href="styles.css" rel="stylesheet" type="text/css" id="cssfile" />
<ul id="headerul">
 <li id="headerlist"><a href="index.php">Inicio</a></li>
 <li id="headerlist"><a href="addcontr.php">Agregar Contratista</a></li>
 <li id="headerlist"><a href="addemp.php">Agregar Empleado</a></li>
 <li id="headerlist" class="active"><a href="addveh.php">Agregar Vehículo</a></li>
 <li id="headerlist" style="float:right"><a href="index.php">About</a></li>
</ul>
<center>
<img src="imgs/logo.svg" class="headerlogo" align="center">
<h3><b>Alta de vehículo.</h3></p>
</center>
</head>
<body>
<div class="row">
	<div class="column1" align="left">
	<form action="addvehsave.php" method="post">
		<p><input type="text" name="dominio" size="10" required> Dominio</p>
		<p><input type="text" name="vehiculo" size="20" required> Vehículo</p>
		<?php
		$link = mysqli_connect('localhost', 'root', '', 'provadecodb');
		$resultSet = mysqli_query($link, "SELECT empresa FROM contratistas");
		$color1 = "lightblue";
		$color2 = "teal";
		$color = "$color1";
		?>
		<select name="empresa">
		<?php
		while($rows = $resultSet->fetch_assoc())
		{
			$color == $color1 ? $color = $color2 : $color = $color1;
			$empresa = $rows[empresa];
			echo "<option value='$empresa' style='background:$color'>$empresa</option>";
		}
		mysqli_close($link);
		?>
	</select> Empresa
	<p>
		Tipo de vehículo:
	</p>
	<p>
		<input type="radio" name="tv" value="a"> A
		<input type="radio" name="tv" value="b"> B
		<input type="radio" name="tv" value="c"> C
		<input type="radio" name="tv" value="d"> D
		<input type="radio" name="tv" value="e"> E
		<input type="radio" name="tv" value="g"> G
	</p>
	</div>

	<div class="column2" align="right">
		<p>Vencimiento de Seguro: <input type="date" name="vencseg" required></p>
		<p>Vencimiento de VTV: <input type="date" name="vencvtv" required></p>
		<p>
			<a href="https://www.mclibre.org/consultar/htmlcss/html/html-formularios.html">ASD</a>
		</p>
	</div>
	<div class="midcol" align="center">
		<p>
			<input type="submit" value="Enviar">
			<input type="reset" value="Borrar">
		</p>
	</div>

</form>
</div>

<footer id="foot">
<h6>Todos los derechos reservados, diseñado para Adecoagro por Juan Pablo Mersuglia</h6>
</footer>
</body>
</html>
