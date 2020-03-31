<html>
<head>
<link href="styles.css" rel="stylesheet" type="text/css" id="cssfile" />
<ul id="headerul">
 <li id="headerlist"><a href="index.php">Inicio</a></li>
 <li id="headerlist"><a href="addcontr.php">Agregar Contratista</a></li>
 <li id="headerlist" class="active"><a href="addemp.php">Agregar Empleado</a></li>
 <li id="headerlist"><a href="addveh.php">Agregar Vehículo</a></li>
 <li id="headerlist" style="float:right"><a href="index.php">About</a></li>
</ul>
<center>
<a href="index.php"><img src="imgs/logo.svg" class="headerlogo" align="center"></a>
<h3><b>Alta de empleado.</h3></p>
</center></head>
<body>
<div class="row">
	<div class="column1" align="left">
	<form action="addempsave.php" method="post">
		<p><input type="number" name="dni" size="15" required> DNI</p>
		<p><input type="text" name="nombre" size="15" required> Nombre</p>
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
		<p><input type="tel" name="telefono" size="15"> Teléfono</p>
		<p><input type="email" name="email" size="15"> E-Mail</p>
	<p>
		Licencia de conducir tipo:
	</p>
	<p>
		<input type="checkbox" name="tl" value="a" multiple> A
		<input type="checkbox" name="tl" value="b" multiple> B
		<input type="checkbox" name="tl" value="c" multiple> C
		<input type="checkbox" name="tl" value="d" multiple> D
		<input type="checkbox" name="tl" value="e" multiple> E
		<input type="checkbox" name="tl" value="g" multiple> G
	</p>
	</div>

	<div class="column2" align="right">
		<p>Vencimiento Licencia: <input type="date" name="venclic"></p>
		<p>Es un sub-contratista?
			 No<input type="radio" name="subcontr" value"No">
			 Si<input type="radio" name="subcontr" value"Si">
		</p>
		<p>Constancia AFIP: <input type="date" name="afip"></p>
		<p>Seguro Personal: <input type="date" name="segpers"></p>
		<p>Clausula no Repetición: <input type="date" name="norep"></p>

	</div>
	<div class="midcol" align="center">
		<p>
			<input type="submit" value="Enviar">
			<input type="reset" value="Borrar">
		</p>
	</div>

	</form>
<footer align="center" id="foot">
<h6>Todos los derechos reservados, diseñado para Adecoagro por Juan Pablo Mersuglia</h6>
</footer>
</div>
</body>
</html>
