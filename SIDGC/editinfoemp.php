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
$subcontr = mysqli_real_escape_string($link, $_REQUEST['subcontr']);
$norep = mysqli_real_escape_string($link, $_REQUEST['norep']);
$seguro = mysqli_real_escape_string($link, $_REQUEST['seguro']);

//Insersion
$sql = ("UPDATE empleados SET telefono = '$telefono', email = '$email', venclicenc = '$venclic', constafip = '$afip', subcontr = '$subcontr', norep = '$norep', seguro = '$seguro' WHERE dni = '$dni'");

if(mysqli_query($link, $sql)){
    echo "Información modificada correctamente. Volver al inicio <a href='index.php'>back</a>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);

?>
