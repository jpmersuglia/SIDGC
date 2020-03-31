<html>
<head>
<link href="styles.css" rel="stylesheet" type="text/css" id="cssfile" />
<ul id="headerul">
 <li id="headerlist" class="active"><a href="index.php">Inicio</a></li>
 <li id="headerlist"><a href="addcontr.php">Agregar Contratista</a></li>
 <li id="headerlist"><a href="addemp.php">Agregar Empleado</a></li>
 <li id="headerlist"><a href="addveh.php">Agregar Vehículo</a></li>
 <li id="headerlist" style="float:right"><a href="index.php">About</a></li>
</ul>
<center>
<img src="imgs/logo.svg" class="headerlogo" align="center">
<h3><b>Software de control de contratistas.</h3></p>
</center>
</head>
<body>

<div class="row">
	<div class="column1" align="left">
	<form action="index.php" method="post">
		<p>Buscar empresa o empleador usando:</p>
		<p><input type="number" name="xdni" class="buscador" size="15"> DNI</p>
		<p><input type="text" name="xnombre" class="buscador" size="25"> Nombre</p>
		<?php
		$link = mysqli_connect('localhost', 'root', '', 'provadecodb');
		$resultSet = mysqli_query($link, "SELECT empresa FROM contratistas");
		$color1 = "lightblue";
		$color2 = "teal";
		$color = "$color1";
		?>
		<select name="empresaselect">
		<option value="blank" style="background:lightblue"></option>
		<?php
		while($rows = mysqli_fetch_assoc($resultSet))
		{
			$color = $color == $color1 ? $color2 : $color1;
			$empresa = $rows['empresa'];
			echo "<option type='text' value='$empresa' style='background:$color'>$empresa</option>";
		}
		mysqli_close($link);

		?>
		</select> Empresa
	</div>

		<div class="column2" align="right">
			<?php
				if(!isset($_POST['empresaselect'])){
					echo "<center><b>Selecciona empresa para ver información detallada</b></center>";
				}else{

					$consulta = $_POST['empresaselect'];

					$link = mysqli_connect('localhost', 'root', '', 'provadecodb');

					$sql1 = mysqli_query($link,"SELECT * FROM `contratistas` WHERE `empresa`='" . $consulta . "'") or die($link->error);

					$row1 = mysqli_fetch_assoc($sql1);

					echo "<div class='infocontratista' align='left'>";
					echo "La empresa <u>" . $consulta . "</u> está registrada a nombre de:</br> <u>" . $row1['nombre'] . "</u>";
					echo "<table border ='1px' name='tablaempresa'";
					echo "<tr>";
						echo "<td><b>DNI: </b></td> <td>".$row1['dni']."</td>";
						echo "</tr>";
						echo "<tr>";
            echo "<td><b>Teléfono:</b> </td> <td>" .$row1['telefono']."</td>";
						echo "</tr>";
						echo "<tr>";
            echo "<td><b>E-Mail:</b> </td> <td>" .$row1['email']."</td>";
						echo "</tr>";
						echo "<tr>";
            echo "<b><td>Tipo de Licencia:</b> </td> <td>" .$row1['tipolicenc']."</td>";
						echo "</tr>";
						echo "<tr>";
            echo "<b><td>Vencimiento de Licencia:</b> </td> <td>" .$row1['venclicenc']."</td>";
						echo "</tr>";
						echo "<tr>";
            echo "<b><td>Constancia de AFIP</b> </td> <td>" .$row1['constafip']."</td>";
						echo "</tr>";
						echo "<tr>";
            echo "<b><td>Formulario 931:</b> </td> <td>" .$row1['f931']."</td>";
						echo "</tr>";
						echo "<tr>";
            echo "<b><td>Nómina de Empleados:</b> </td> <td>" .$row1['nomemp']."</td>";
						echo "</tr>";
						echo "<tr>";
            echo "<b><td>Cláusula de no Repetición:</b> </td> <td>" .$row1['norep']."</td>";
						echo "</tr>";
						echo "<tr>";
            echo "<b><td>Seguro Personal:</b> </td> <td>" .$row1['segpers']."</td>";
					echo "</tr>";
					echo "</table>";
					echo "</div>";

				$sql2 = mysqli_query($link,"SELECT * FROM `empleados` WHERE `empresa`='" . $consulta . "'") or die($link->error);
					echo "<table border ='1px' name='tablacontratistas'>";
					echo "Empleados registrados de " . $consulta;
							echo "<th>DNI</th>";
							echo "<th>Nombre</th>";
				while($row2 = mysqli_fetch_array($sql2)){
						echo "<tr>";
							echo "<td>" .$row2['dni'] . "</td>";
							echo "<td>" .$row2['nombre'] . "</td>";
						echo "</tr>";

				}
					echo "</table>";
				}

				// mysqli_close($link);
				?>


	</div>


	<div class="column3" align="center">
	<p>
		<p><input type="submit" class="search" value="Buscar"></p>
		<p><input type="submit" class="modify" value="Modificar" formaction="editinfo.php"></p>
	</p>
	</div>
	</form>
</div>

<div class="expiredates">
		<div class="headexpiredates">
			Notificaciones de vencimientos actuales:
		</div>
		<div class="contentexpiredates">
				<?php
				$link = mysqli_connect("localhost", "root", "", "provadecodb");

				$queryvenc1 = mysqli_query($link,"SELECT * FROM `contratistas`");
				while($row = mysqli_fetch_assoc($queryvenc1)){
					$venclic = $row['venclicenc'];
					$constafip = $row['constafip'];
					$nomemp = $row['nomemp'];
					$norep = $row['norep'];
					$segpers = $row['segpers'];
					$user = $row['nombre'];
					$dni = $row['dni'];
					$empresa = $row['empresa'];
					$datenow = date("Y-m-d");

					if($datenow > $venclic || $datenow > $constafip || $datenow > $nomemp || $datenow > $norep || $datenow > $segpers){
						echo "<div class='detailed'>";
						echo "<img src='imgs/alert.png'> [" . $dni . "] El contratista " . $user . " de la empresa [" . $empresa . "] Tiene datos vencidos </br>";
						echo "</div>";
					}
				}

				$queryvenc2 = mysqli_query($link,"SELECT * FROM `empleados`");
				while($row2 = mysqli_fetch_assoc($queryvenc2)){
					$venclic2 = $row2['venclicenc'];
					$constafip2 = $row2['constafip'];
					$norep2 = $row2['norep'];
					$seguro2 = $row2['seguro'];
					$user2 = $row2['nombre'];
					$dni2 = $row2['dni'];
					$empresa2 = $row2['empresa'];
					$datenow2 = date("Y-m-d");

					if($datenow2 > $venclic2 || $datenow2 > $constafip2 || $datenow2 > $norep2 || $datenow2 > $seguro2){
					echo "<div class='detailed2'>";
					echo "<img src='imgs/alert.png'> [" . $dni2 . "] El empleado " . $user2 . " de la empresa [" . $empresa2 . "] Tiene datos vencidos </br>";
					echo "</div>";
					}
				}

				$queryvenc3 = mysqli_query($link,"SELECT * FROM `vehiculos`");
				while($row3 = mysqli_fetch_assoc($queryvenc3)){
					$vencseg3 = $row3['vencseg'];
					$vencvtv3 = $row3['vencvtv'];
					$dominio3 = $row3['dominio'];
					$empresa3 = $row3['empresa'];
					$vehiculo3 = $row3['vehiculo'];
					$datenow3 = date("Y-m-d");

					if($datenow3 > $vencseg3 || $datenow3 > $vencvtv3){
						echo "<div class='detailed3'>";
						echo "<img src='imgs/alert.png'> [" . $dominio3 . "] El vehículo " . $vehiculo3 . " de la empresa [" . $empresa3 . "] Tiene datos vencidos </br>";
						echo "</div>";
					}
				}


			 	?>
		</div>
</div>

<footer id="foot">
<h6>Todos los derechos reservados, diseñado para Adecoagro por Juan Pablo Mersuglia</h6>
</footer>
</body>
</html>
