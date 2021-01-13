<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, initial-scale-1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.1.9/p5.js" integrity="sha512-rMaqGbYalDaQz0lWNF2L8DHPtf4NW+gSZomExS0LcsNyRS4Rmj21+dt97XfXCZE/E569eX72Bh//Jt1EpStgiA==" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="../img/logo.png">
    
   <title>Mi Galeria</title>
    <!--Esta es la pagina donde el usuario tiene sus imagenes-->
  </head>
  <body>

  <div class="container-fluid">

<?php 
    session_start();
    include('../acceso_db.php'); // incluyo los datos de conexion a la BD 

    if(isset($_SESSION['usuario_nombre'])) { // compruebo que la sesion esta iniciada

        $usuario_nombre = $_SESSION['usuario_nombre']; 
        include("headerGaleria.php"); //incluyo el header 
        echo '<div class="container">';
        echo '<h1 class="font-weight-light text-center text-lg mt-4 mb-0">Mis ilustraciones</h1></br>'; //titulo
        include("misImagenes.php"); //Incluyo el archivo de la galeria de imagenes del usuario
        echo '</div>';
      
    }
    
?>



	<script src="../js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
   
   
  </body>
</html>