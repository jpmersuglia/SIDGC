<html>
<head>
<link href="styles.css" rel="stylesheet" type="text/css" id="cssfile" />
<ul id="headerul">
 <li id="headerlist"><a href="index.php">Inicio</a></li>
 <li id="headerlist" class="active"><a href="addcontr.php">Agregar Contratista</a></li>
 <li id="headerlist"><a href="addemp.php">Agregar Empleado</a></li>
 <li id="headerlist"><a href="addveh.php">Agregar Vehículo</a></li>
 <li id="headerlist" style="float:right"><a href="index.php">About</a></li>
</ul>
<center>
<a href="index.php"><img src="imgs/logo.svg" class="headerlogo" align="center"></a>
<h3><b>Alta de contratista.</h3></p>
</center>
</head>
<body>
<div class="row">
	<div class="column1" align="left">
	<form action="addcontrsave.php" method="post">
		<p><input type="number" name="dni" size="15" required> DNI</p>
		<p><input type="text" name="nombre" size="15" required> Nombre</p>
		<p><input type="text" name="empresa" size="15" required> Empresa</p>
		<p><input type="tel" name="telefono" size="15" required> Teléfono</p>
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
		<p>Constancia AFIP: <input type="date" name="afip" required></p>
		<p>Formulario 931: <input type="date" name="f931" ></p>
		<p>Nómina de Empleados: <input type="date" name="nomemp"></p>
		<p>Clausula no Repetición: <input type="date" name="norep" required></p>
		<p>Seguro Personal <input type="date" name="segpers" required></p>

	</div>


	<div class="midcol" align="center">
	<p>
		<input type="submit" value="Cargar">
		<input type="reset" value="Borrar">
	</p>
	</div>
	</form>
</div>

<footer align="center" id="foot">
<h6>Todos los derechos reservados, diseñado para Adecoagro por Juan Pablo Mersuglia</h6>
</footer>
</body>
</html>
