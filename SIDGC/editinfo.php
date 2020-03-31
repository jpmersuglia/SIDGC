<html>
<head>
<link href="styles.css" rel="stylesheet" type="text/css" id="cssfile" />
<ul id="headerul">
 <li id="headerlist" class="active"><a href="index.php">Inicio</a></li>
 <li id="headerlist"><a href="addcontr.php">Agregar Contratista</a></li>
 <li id="headerlist"><a href="addemp.php">Agregar Empleado</a></li>
 <li id="headerlist" style="float:right"><a href="index.php">About</a></li>
</ul>
<center>
<a href="index.php"><img src="imgs/logo.svg" class="headerlogo" align="center"></a>
<h3><b>Editar informacion.</h3></p>
</center>
</head>
<body>

<?php
$link = mysqli_connect('localhost', 'root', '', 'provadecodb');

if (!isset($_POST['xdni'])){
  echo "<div class='error'>";
  echo "COMO PRETENDES EDITAR INFORMACIÓN SI NO SABEMOS DE QUIEN!!?";
  ECHO "<a href='index.php'>Volver al Inicio</a>";
  echo "</div>";
  }else{
    $search = $_POST['xdni'];
    $query = ("SELECT * FROM contratistas WHERE dni=$search");
    $resultSet1 = mysqli_query($link,$query) or die("Error de query 1333" . mysql_error());

    if(mysqli_num_rows($resultSet1) > 0) {

      $data = "SELECT dni FROM contratistas WHERE dni = {$search}";
      $nombre = "SELECT nombre FROM contratistas WHERE dni = {$search}";
      $empresa = "SELECT empresa FROM contratistas WHERE dni = {$search}";
      $telefono = "SELECT telefono FROM contratistas WHERE dni = {$search}";
      $email = "SELECT email FROM contratistas WHERE dni = {$search}";
      $venclicenc = "SELECT venclicenc FROM contratistas WHERE dni = {$search}";
      $constafip = "SELECT constafip FROM contratistas WHERE dni = {$search}";
      $f931 = "SELECT f931 FROM contratistas WHERE dni = {$search}";
      $nomemp = "SELECT nomemp FROM contratistas WHERE dni = {$search}";
      $norep = "SELECT norep FROM contratistas WHERE dni = {$search}";
      $segpers = "SELECT segpers FROM contratistas WHERE dni = {$search}";

      $query = mysqli_query($link, $data) or die ("Couldn't execute query 1. ". mysql_error());
      $query2 = mysqli_query($link, $nombre) or die ("Couldn't execute query 1. ". mysql_error());
      $query3 = mysqli_query($link, $empresa) or die ("Couldn't execute query 1. ". mysql_error());
      $query4 = mysqli_query($link, $telefono) or die ("Couldn't execute query 1. ". mysql_error());
      $query5 = mysqli_query($link, $email) or die ("Couldn't execute query 1. ". mysql_error());
      $query6 = mysqli_query($link, $venclicenc) or die ("Couldn't execute query 1. ". mysql_error());
      $query7 = mysqli_query($link, $constafip) or die ("Couldn't execute query 1. ". mysql_error());
      $query8 = mysqli_query($link, $f931) or die ("Couldn't execute query 1. ". mysql_error());
      $query9 = mysqli_query($link, $nomemp) or die ("Couldn't execute query 1. ". mysql_error());
      $query10 = mysqli_query($link, $norep) or die ("Couldn't execute query 1. ". mysql_error());
      $query11 = mysqli_query($link, $segpers) or die ("Couldn't execute query 1. ". mysql_error());

          $dni = mysqli_fetch_array($query);
          $nombre = mysqli_fetch_array($query2);
          $empresa = mysqli_fetch_array($query3);
          $telefono = mysqli_fetch_array($query4);
          $email = mysqli_fetch_array($query5);
          // $tl = mysqli_fetch_array($query['tipolicenc']);
          $venclicenc = mysqli_fetch_array($query6);
          $constafip = mysqli_fetch_array($query7);
          $f931 = mysqli_fetch_array($query8);
          $nomemp = mysqli_fetch_array($query9);
          $norep = mysqli_fetch_array($query10);
          $segpers = mysqli_fetch_array($query11);

          echo "<form action='editinfocontr.php' method='post' align='center'>";
          echo "<p><input type='number' name='dni' size='15' readonly value=$dni[dni]> DNI</p>";
          echo "<p>NOMBRE: $nombre[nombre]</p>";
          echo "<p><input type='text' name='empresa' size='15' readonly value='$empresa[empresa]'> EMPRESA</p>";
          echo "<p><input type='text' name='telefono' size='15' required value=$telefono[telefono]> TELÉFONO</p>";
          echo "<p><input type='text' name='email' size='15' required value=$email[email]> E-MAIL</p>";
          echo "<p><input type='date' name='venclicenc' size='15' required value=$venclicenc[venclicenc]> VENCIMIENTO LICENCIA DE CONDUCIR</p>";
          echo "<p><input type='date' name='constafip' size='15' required value=$constafip[constafip]> CONSTANCIA DE AFIP</p>";
          echo "<p><input type='date' name='nomemp' size='15' required value=$nomemp[nomemp]> NÓMINA DE EMPLEADOS</p>";
          echo "<p><input type='date' name='f931' size='15' required value=$f931[f931]> FORMULARIO 931</p>";
          echo "<p><input type='date' name='norep' size='15' required value=$norep[norep]> CLÁUSULA DE NO REPETICIÓN</p>";
          echo "<p><input type='date' name='segpers' size='15' required value=$segpers[segpers]> SEGURO PERSONAL</p>";
          echo "<input type='submit' value='Cargar'>";
      		echo "<input type='submit' name='deletecontr' value='Borrar' color='red' formaction='deleteinfo.php'>";
          echo "</form>";

    }elseif(mysqli_num_rows($resultSet1) == 0){
      $dnicheck2 = "SELECT dni FROM empleados WHERE dni=$search";
      $resultSet2 = mysqli_query($link,$dnicheck2) or die("No se puede ejecutar la query 1444 " . mysql_error());
      if(mysqli_num_rows($resultSet2) > 0){

        $data = "SELECT dni FROM empleados WHERE dni={$search}";
        $nombre = "SELECT nombre FROM empleados WHERE dni={$search}";
        $empresa = "SELECT empresa FROM empleados WHERE dni={$search}";
        $telefono = "SELECT telefono FROM empleados WHERE dni={$search}";
        $email = "SELECT email FROM empleados WHERE dni={$search}";
        $venclicenc = "SELECT venclicenc FROM empleados WHERE dni={$search}";
        $constafip = "SELECT constafip FROM empleados WHERE dni={$search}";
        $subcontr = "SELECT subcontr FROM empleados WHERE dni={$search}";
        $seguro = "SELECT seguro FROM empleados WHERE dni={$search}";
        $norep = "SELECT norep FROM empleados WHERE dni={$search}";

        $query = mysqli_query($link,$data) or die("Couldn't Execute Query 2" . mysql_error);
        $query2 = mysqli_query($link,$nombre) or die("Couldn't Execute Query 2" . mysql_error);
        $query3 = mysqli_query($link,$empresa) or die("Couldn't Execute Query 2" . mysql_error);
        $query4 = mysqli_query($link,$telefono) or die("Couldn't Execute Query 2" . mysql_error);
        $query5 = mysqli_query($link,$email) or die("Couldn't Execute Query 2" . mysql_error);
        $query6 = mysqli_query($link,$venclicenc) or die("Couldn't Execute Query 2" . mysql_error);
        $query7 = mysqli_query($link,$constafip) or die("Couldn't Execute Query 2" . mysql_error);
        $query8 = mysqli_query($link,$subcontr) or die("Couldn't Execute Query 2" . mysql_error);
        $query9 = mysqli_query($link,$seguro) or die("Couldn't Execute Query 2" . mysql_error);
        $query10 = mysqli_query($link,$norep) or die("Couldn't Execute Query 2" . mysql_error);


          $dni = mysqli_fetch_array($query);
          $nombre = mysqli_fetch_array($query2);
          $empresa = mysqli_fetch_array($query3);
          $telefono = mysqli_fetch_array($query4);
          $email = mysqli_fetch_array($query5);
          // $tl = mysqli_fetch_array($query['tipolicenc']);
          $venclicenc = mysqli_fetch_array($query6);
          $constafip = mysqli_fetch_array($query7);
          $subcontr = mysqli_fetch_array($query8);
          $seguro = mysqli_fetch_array($query9);
          $norep = mysqli_fetch_array($query10);

          echo "<form action='editinfoemp.php' method='post'>";
          echo "<p><input type='number' name='dni' size='15' readonly value=$dni[dni]> DNI</p>";
          echo "<p>NOMBRE: $nombre[nombre]</p>";
          echo "<p>EMPRESA: $empresa[empresa]</p>";
          echo "<p><input type='text' name='telefono' size='15' required value=$telefono[telefono]> TELÉFONO</p>";
          echo "<p><input type='text' name='email' size='15' required value=$email[email]> E-MAIL</p>";
          echo "<p><input type='date' name='venclicenc' size='15' required value=$venclicenc[venclicenc]> VENCIMIENTO LICENCIA DE CONDUCIR</p>";
          echo "<p>SUB CONTRATISTA: <input type='radio' name='subcontr' value'No'>No<input type='radio' name='subcontr' value'Si'>Si</p>";
          echo "<p><input type='date' name='constafip' size='15' required value=$constafip[constafip]> CONSTANCIA AFIP</p>";
          echo "<p><input type='date' name='seguro' size='15' required value=$seguro[seguro]> SEGURO PERSONAL</p>";
          echo "<p><input type='date' name='norep' size='15' required value=$norep[norep]> CLÁUSULA DE NO REPETICIÓN</p>";
          echo "<input type='submit' value='Cargar'>";
      		echo "<input type='submit' name='deleteemp' value='Borrar' color='red' formaction='deleteinfo.php'>";
          echo "</form>";


      }else{
        echo "DNI " . $search . " No Encontrado!";
      }

    }else{
      echo "DNI " . $search . " No encontrado!";
    }
  }
  mysqli_close($link);
?>
<footer align="center" id="foot">
<h6>Todos los derechos reservados, diseñado para Adecoagro por Juan Pablo Mersuglia</h6>
</footer>
</body>
</html>
