<?php
/*Comando para conectar a la base de datos de prueba, modificar para proyecto real.*/
$link = mysqli_connect("localhost", "root", "", "provadecodb");
//Check conexion
if(!$link){
	die("ERROR: No se puede conectar. " . mysqli_connect_error());
}

//Escape input 4sec
$dominio = mysqli_real_escape_string($link, $_REQUEST['dominio']);
$vehiculo = mysqli_real_escape_string($link, $_REQUEST['vehiculo']);
$empresa = mysqli_real_escape_string($link, $_REQUEST['empresa']);
$tipoveh = mysqli_real_escape_string($link, $_REQUEST['tv']);
$vencseg = mysqli_real_escape_string($link, $_REQUEST['vencseg']);
$vencvtv = mysqli_real_escape_string($link, $_REQUEST['vencvtv']);

//Insersion
$sql = "INSERT INTO vehiculos (dominio, vehiculo, empresa, tipoveh, vencvtv, vencseg)
VALUES ('$dominio', '$vehiculo', '$empresa', '$tipoveh', '$vencvtv', '$vencseg')";

if(mysqli_query($link, $sql)){
    echo "Vehículo registrado correctamente. Volver <a href='addveh.php'>atras</a>";
} else{
    echo "ERROR: No se puede ejecutar $sql. Volver <a href='addveh.php'>atras</a>" . mysqli_error($link);
}

mysqli_close($link);

?>
