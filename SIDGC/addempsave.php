<?php
/*Comando para conectar a la base de datos de prueba, modificar para proyecto real.*/
$link = mysqli_connect("localhost", "root", "", "provadecodb");
//Check conexion
if(!$link){
	die("ERROR: No se puede conectar. " . mysqli_connect_error());
}

//Escape input 4sec
$dni = mysqli_real_escape_string($link, $_REQUEST['dni']);
$nombre = mysqli_real_escape_string($link, $_REQUEST['nombre']);
$empresa = mysqli_real_escape_string($link, $_REQUEST['empresa']);
$telefono = mysqli_real_escape_string($link, $_REQUEST['telefono']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$tipolic = mysqli_real_escape_string($link, $_REQUEST['tl']);
$venclic = mysqli_real_escape_string($link, $_REQUEST['venclic']);
$afip = mysqli_real_escape_string($link, $_REQUEST['afip']);
$subcontr = mysqli_real_escape_string($link, $_REQUEST['subcontr']);
$segpers = mysqli_real_escape_string($link, $_REQUEST['segpers']);
$norep = mysqli_real_escape_string($link, $_REQUEST['norep']);

//Insersion
$sql = "INSERT INTO empleados (dni, nombre, empresa, telefono, email, tipolicenc, venclicenc, constafip, subcontr, seguro, norep)
VALUES ('$dni', '$nombre', '$empresa', '$telefono', '$email', '$tipolic', '$venclic', '$afip', '$subcontr', '$segpers', '$norep')";

if(mysqli_query($link, $sql)){
		echo "<div class='sucess'>";
    echo "Empleado registrado correctamente. Volver <b><a href='addemp.php'>atras</a></b>";
		echo "<br>";
		echo "Volver al <b><a href='index.php'>inicio</a></b>";
		echo "</div>";
} else{
		echo "<div class='error'>";
    echo "ERROR: No se puede ejecutar $sql. Volver <a href='addemp.php'>atras</a>" . mysqli_error($link);
		echo "</div>";
}

mysqli_close($link);

?>
