<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="../img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.1.9/p5.js" integrity="sha512-rMaqGbYalDaQz0lWNF2L8DHPtf4NW+gSZomExS0LcsNyRS4Rmj21+dt97XfXCZE/E569eX72Bh//Jt1EpStgiA==" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Galeria</title>
  </head>
  <body>
  <div class="container-fluid">
  <?php //Esta es la pagina donde esta la obra colaborativa
  session_start();
  include('../acceso_db.php');  //Incluyo BD
  include('headerGaleria.php'); //Incluyo Header
  ?>
  
   
   <h1 class="font-weight-light text-center text-lg mt-4 mb-0">Obra Colaborativa</h1> <!--Titulo-->
</br>
  <?php
  
  include('obraColaborativa.php'); //Incluyo el archivo de la obra colaborativa

  ?>
</div>
  </body>
</html>