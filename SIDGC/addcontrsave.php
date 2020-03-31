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
$f931 = mysqli_real_escape_string($link, $_REQUEST['f931']);
$nomemp = mysqli_real_escape_string($link, $_REQUEST['nomemp']);
$norep = mysqli_real_escape_string($link, $_REQUEST['norep']);
$segpers = mysqli_real_escape_string($link, $_REQUEST['segpers']);

//Insersion
$sql = "INSERT INTO contratistas (dni, nombre, empresa, telefono, email, tipolicenc, venclicenc, constafip, f931, nomemp, norep, segpers)
VALUES ('$dni', '$nombre', '$empresa', '$telefono', '$email', '$tipolic', '$venclic', '$afip', '$f931', '$nomemp', '$norep', '$segpers')";

if(mysqli_query($link, $sql)){
		echo "<div class='sucess'>";
    echo "Contratista y empresa registrados correctamente. Volver al <a href='index.php'>inicio</a>";
		echo "</div>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);

?>
