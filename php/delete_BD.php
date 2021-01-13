<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="utf-8">
    <link rel="icon" type="image/png" href="img/dibu.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.1.9/p5.js" integrity="sha512-rMaqGbYalDaQz0lWNF2L8DHPtf4NW+gSZomExS0LcsNyRS4Rmj21+dt97XfXCZE/E569eX72Bh//Jt1EpStgiA==" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>

<?php
//P�ginas restringidas:
//Como en toda web con sistema de usuarios, siempre habr�n zonas restringidas 
//a las que s�lo podr�n acceder usuarios registrados, entonces para ello partimos del siguiente c�digo:

    session_start(); 
    include('../acceso_db.php'); // inclu�mos los datos de acceso a la BD
    // comprobamos que se haya iniciado la sesi�n, o sea que un usuaior autorizado haya iniciado sesion

    if($_SESSION['usuario_nombre']=='guiyeta') {
        include("headerGaleria.php");
?> 


<html>
<body>

<?php 

    $sql = "SELECT * FROM usuarios"; //Selecciona todos los datos de la tabla usuarios
    $result = $conn->query($sql);

?>
<div class="container">
<div class="jumbotron">
<h1>Eliminar usuario:</h1>
<p>Selecciona un Usuario:</p>
</div>

<div> <!--Seleccione el usuario que quiero eliminar-->
<form action="procesar_delete_BD.php" class=" validate-form flex-sb flex-w " method="post">
<select  name="borrar">
<option >Seleccione un Usuarios</option>

<?php

while ($row=$result->fetch_assoc())
{
echo "<option value=".$row['usuario_nombre'].">".$row['usuario_nombre']."</option>\n"; //opciones de usuarios a eliminan mediante array asociativo
} 


?>

</select>

<div class="container-login100-form-btn">
<button name="enviar" class="login100-form-btn" style="margin-top:2em;">
Eliminar
</button>
</div>
</form>
</div></div>
</div>


<?php 
    }
	//Si no es as�, o sea no se ha iniciado sesion, lo indicamos...
	else { 
        echo "<script>alert('Solo podes acceder si sos administrador.');window.location='../index.php';</script>"; 
    }
    
?>


</body>
</html>
