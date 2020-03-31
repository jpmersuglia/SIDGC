<?php
/*Comando para conectar a la base de datos de prueba, modificar para proyecto real.*/
$link = mysqli_connect("localhost", "root", "", "provadecodb");
//Check conexion
if(!$link){
	die("ERROR: No se puede conectar. " . mysqli_connect_error());
}

//Escape input 4sec
$dni = mysqli_real_escape_string($link, $_REQUEST['dni']);
$telefono = mysqli_real_escape_string($link, $_REQUEST['telefono']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$venclic = mysqli_real_escape_string($link, $_REQUEST['venclicenc']);
$afip = mysqli_real_escape_string($link, $_REQUEST['constafip']);
$f931 = mysqli_real_escape_string($link, $_REQUEST['f931']);
$nomemp = mysqli_real_escape_string($link, $_REQUEST['nomemp']);
$norep = mysqli_real_escape_string($link, $_REQUEST['norep']);
$segpers = mysqli_real_escape_string($link, $_REQUEST['segpers']);

//Insersion
$sql = ("UPDATE contratistas SET telefono = '$telefono', email = '$email', venclicenc = '$venclic', constafip = '$afip', f931 = '$f931', nomemp = '$nomemp', norep = '$norep', segpers = '$segpers' WHERE dni = '$dni'");

if(mysqli_query($link, $sql)){
		echo "<div class='sucess'>";
    echo "Información modificada correctamente. Volver al <a href='index.php'>inicio</a>";
		echo "</div>";
} else{
		echo "<div class='error'>";
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		echo "</div>";
}

mysqli_close($link);

?>
