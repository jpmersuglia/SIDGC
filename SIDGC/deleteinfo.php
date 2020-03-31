<?php
/*Comando para conectar a la base de datos de prueba, modificar para proyecto real.*/
$link = mysqli_connect("localhost", "root", "", "provadecodb");
//Check conexion
if(!$link){
	die("ERROR: No se puede conectar. " . mysqli_connect_error());
}

if(isset($_POST['deletecontr'])){
  $dcquery = $_POST['empresa'];
  //$catchempr = ("SELECT `empresa` FROM `contratistas` WHERE dni='$dcquery'");
  $query = ("DELETE FROM `contratistas` WHERE empresa='$dcquery'");
  $query2 = ("DELETE FROM `empleados` WHERE empresa='$dcquery'");
  mysqli_query($link,$query);
  mysqli_query($link,$query2);
  echo "<div class='sucess'>";
  echo "La empresa a sido eliminada de la base de datos";
  echo "</div>";
}elseif(isset($_POST['deleteemp'])){
  $dequery = $_POST['dni'];
  $query = ("DELETE FROM `empleados` WHERE dni='$dequery'");
  mysqli_query($link,$query);
  echo "Empleado borrado correctamente";
}else{
  echo "<div class='error'>";
  echo "Error: Volver al <a href='index.php'>inicio</a>";
  echo "</div>";
}


// if(mysqli_query($link, $sql)){
//     echo "Información modificada correctamente. Volver al inicio <a href='index.php'>back</a>";
// } else{
//     echo "ERROR: No se puede borrar al contratista $sql. " . mysqli_error($link);
// }

mysqli_close($link);

?>
