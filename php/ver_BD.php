<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
    <link rel="icon" type="image/png" href="../img/dibu.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.1.9/p5.js" integrity="sha512-rMaqGbYalDaQz0lWNF2L8DHPtf4NW+gSZomExS0LcsNyRS4Rmj21+dt97XfXCZE/E569eX72Bh//Jt1EpStgiA==" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>

<?php

    session_start(); 
    include('../acceso_db.php'); // incluyo los datos de acceso a la BD
    // comprobamos que el administrador haya iniciado sesion

    if($_SESSION['usuario_nombre']=='guiyeta') 
		{
            include("headerGaleria.php");
?> 

<?php
						//Realizo una consulta a todos los registros de usuario
			$sql = "SELECT * FROM usuarios";
            $result = $conn->query($sql);
			//creo un formulario que tenga un combo select
?>

            <div class="container">
            <div class="jumbotron">
            <h1>Ver datos de los usuarios</h1>
			<p>Selecciona un Usuario:</p>
		
            
			<form action="ver_BD.php" method="post"> 
			<select name="ver" onchange= "this.form.submit()">
                <option>Seleccione un Usuario</option>

<?php
			//leo nombre de registros armando una opcion por cada uno
			while ($row=$result->fetch_assoc())
				{
					echo "<option value=".$row['usuario_nombre'].">".$row['usuario_nombre']."</option>\n"; 
				}
	
?>

			</select>
			</form>




<?php
			//si el registro ya esta seteado lo muestro sino no
			if(isset($_POST['ver']))
				{
					$name=$_POST['ver'];
					$sql = "SELECT * FROM usuarios WHERE usuario_nombre='$name'"; //Seleciono todo los datos de usuarios donde el nombre de usuario coincida con el nombre que selecciono el admin
                    $seleccion = $conn->query($sql);

					while($row = $seleccion->fetch_assoc())
						{
							//imprimo la informaci�n que quiero
							echo "<br>";
							echo "Numero de Id= " . $row['usuario_id'];
							echo "<br>";
							echo "Nombre de Usuario = " . $row['usuario_nombre'];
							echo "<br>";
							echo "E-Mail = " . $row['usuario_email'];
							echo "<br>";
							echo "Fecha de Ingreso = " . $row['usuario_freg'];
							echo "<br>";
							echo "<br>"; //Lo muestro 
						}

				}
    echo "<br>";
	
				
 ?>
 </div>
				</div>
 <?php
		}
		//Si no es asi, o sea no se ha iniciado sesion, lo indicamos...
		else { 
				echo "<script>alert('Solo podes acceder si sos administrador.');window.location='../index.php';</script>"; 
			}
     
     
?>


</body>
</html>
