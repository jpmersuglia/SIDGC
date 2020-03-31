<html>
<head>
<link href="styles.css" rel="stylesheet" type="text/css" id="cssfile" />
<center>
<img src="imgs/logo.svg" class="headerlogo" align="center">
<h3><b>Editar informacion de contratista.</h3></p>
</center>
</head>
<body>

<?php
$link = mysqli_connect('localhost', 'root', '', 'provadecodb');
if (!isset($_POST['xdni'])){
  echo "NO SE PUEDE CARGAR LOS DATOS POR QUE NO SE SELECCIONO UN CONTRATISTA";
  }else{
    $search = $_POST['xdni'];

    $data = "SELECT dni FROM contratistas WHERE dni = {$search}";
    $nombre = "SELECT nombre FROM contratistas WHERE dni = {$search}";
    $empresa = "SELECT empresa FROM contratistas WHERE dni = {$search}";
    $telefono = "SELECT telefono FROM contratistas WHERE dni = {$search}";
    $email = "SELECT email FROM contratistas WHERE dni = {$search}";
    $tl = "SELECT tipolicenc FROM contratistas WHERE dni = {$search}";
    $venclicenc = "SELECT venclicenc FROM contratistas WHERE dni = {$search}";
    $constafip = "SELECT constafip FROM contratistas WHERE dni = {$search}";
    $f931 = "SELECT f931 FROM contratistas WHERE dni = {$search}";
    $nomemp = "SELECT nomemp FROM contratistas WHERE dni = {$search}";
    $norep = "SELECT norep FROM contratistas WHERE dni = {$search}";
    $segpers = "SELECT segpers FROM contratistas WHERE dni = {$search}";

      $query = mysqli_query($link, $data) or die ("Couldn't execute query 1. ". mysql_error());
      $query3 = mysqli_query($link, $nombre) or die ("Couldn't execute query 3. ". mysql_error());
      $query4 = mysqli_query($link, $empresa) or die ("Couldn't execute query 4. ". mysql_error());
      $query5 = mysqli_query($link, $telefono) or die ("Couldn't execute query 5. ". mysql_error());
      $query6 = mysqli_query($link, $email) or die ("Couldn't execute query 6. ". mysql_error());
      $query7 = mysqli_query($link, $tl) or die ("Couldn't execute query 7. ". mysql_error());
      $query8 = mysqli_query($link, $venclicenc) or die ("Couldn't execute query 8. ". mysql_error());
      $query9 = mysqli_query($link, $constafip) or die ("Couldn't execute query 9. ". mysql_error());
      $query10 = mysqli_query($link, $f931) or die ("Couldn't execute query 10. ". mysql_error());
      $query11= mysqli_query($link, $nomemp) or die ("Couldn't execute query 11. ". mysql_error());
      $query12 = mysqli_query($link, $norep) or die ("Couldn't execute query 12. ". mysql_error());
      $query13 = mysqli_query($link, $segpers) or die ("Couldn't execute query 13. ". mysql_error());

        $dni = mysqli_fetch_array($query);
        $nombre = mysqli_fetch_array($query3);
        $empresa = mysqli_fetch_array($query4);
        $telefono = mysqli_fetch_array($query5);
        $email = mysqli_fetch_array($query6);
        $tl = mysqli_fetch_array($query7);
        $venclicenc = mysqli_fetch_array($query8);
        $constafip = mysqli_fetch_array($query9);
        $f931 = mysqli_fetch_array($query10);
        $nomemp = mysqli_fetch_array($query11);
        $norep = mysqli_fetch_array($query12);
        $segpers = mysqli_fetch_array($query13);

?>



<div class="row">
	<div class="column1" align="left">
	<form action="xxx.php" method="post">
		<p><input type="number" name="dni" size="15" required value="<?php echo $dni['dni']?>"> DNI</p>
		<p><input type="text" name="nombre" size="15" required value="<?php echo $nombre['nombre']?>"> Nombre</p>
		<p><input type="text" name="empresa" size="15" required value="<?php echo $empresa['empresa']?>"> Empresa</p>
		<p><input type="tel" name="telefono" size="15" value="<?php echo $telefono['telefono']?>"> Teléfono</p>
		<p><input type="email" name="email" size="15" value="<?php echo $email['email']?>"> E-Mail</p>
	<p>
		Licencia de conducir tipo:
	</p>
	<p>
		<input type="radio" name="tl" value="a"> A
		<input type="radio" name="tl" value="b"> B
		<input type="radio" name="tl" value="c"> C
		<input type="radio" name="tl" value="d"> D
		<input type="radio" name="tl" value="e"> E
		<input type="radio" name="tl" value="g"> G
	</p>
	</div>

	<div class="column2" align="right">
		<p>Vencimiento Licencia: <input type="date" name="venclic" value="<?php echo $venclicenc['venclicenc']?>"></p>
		<p>Constancia AFIP: <input type="date" name="afip" required value="<?php echo $constafip['constafip']?>"></p>
		<p>Formulario 931: <input type="date" name="f931" value="<?php echo $f931['f931']?>"></p>
		<p>Nómina de Empleados: <input type="date" name="nomemp" value="<?php echo $nomemp['nomemp']?>"></p>
		<p>Clausula no Repetición: <input type="date" name="norep" required value="<?php echo $norep['norep']?>"></p>
		<p>Seguro Personal <input type="date" name="segpers" required value="<?php echo $segpers['segpers']?>"></p>
		<p>
			<a href="https://www.mclibre.org/consultar/htmlcss/html/html-formularios.html">ASD</a>
		</p>
	</div>

	<div class="midcol" align="center">
	<p>
		<input type="submit" value="Cargar">
		<input type="reset" value="Borrar">
	</p>
	</div>
	</form>
</div>
<?php
  }
  mysqli_close($link);
?>
<footer align="center" id="foot">
<h6>Todos los derechos reservados: Juan Pablo Mersuglia <p> Para Adecoagro </p></h6>
</footer>
</body>
</html>
