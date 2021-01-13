<!DOCTYPE html>

<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Mi galeria</title>
  <link rel="icon" type="image/png" href="../img/logo.png">
  <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <!-- Carga la librerías p5 y el scketch junto con la página. -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.1.9/p5.js" integrity="sha512-rMaqGbYalDaQz0lWNF2L8DHPtf4NW+gSZomExS0LcsNyRS4Rmj21+dt97XfXCZE/E569eX72Bh//Jt1EpStgiA==" crossorigin="anonymous"></script>

</head>

<body>
<div class="container-fluid">
<?php
session_start();
include('../acceso_db.php');

if(isset($_SESSION['usuario_nombre'])) { // compruebo que la sesion esta iniciada

  $usuario_nombre = $_SESSION['usuario_nombre'];  //variable con el nombre de usuario del usuario en sesion
  include("headerGaleria.php"); //incluyo header
  ?>
  <div class="container">  <br><br><br><br>
        <?php
       $carpeta = 'img/'.$usuario_nombre; //variable con el nombre de la carpeta a donde se van a subir las imagenes del usuario

       if (!file_exists($carpeta)) { //si la carpeta no exsiste, la creo
           mkdir($carpeta, 0777, true);
       }
    


            
            $nombre = $_FILES["usuario_img"]["name"]; //variable con el nombre del archivo
            $ruta = 'img/' . $usuario_nombre . '/' . $_FILES["usuario_img"]["name"];  //variable con la ruta del archivo

          $reg= "INSERT INTO imagenes (usuario_nb, nombreImg, rutaImg, img_freq) VALUES('$usuario_nombre', '$nombre', '$ruta', NOW())"; //query para meter las datos en la tabla
    if (file_exists("img/". $usuario_nombre . '/' . $_FILES["usuario_img"]["name"]))  //Si ya existe un archivo con ese nombre en la carpeta, le aviso y lo mando de vuelta a la pagina anterior
      { ?> 
        
        <script>alert('Ya existe una imagen con ese nombre en el directorio. Intente con otra imagen o pruebe de guardarla con otro nombre.')
        ;window.location='img_subir.php';</script>
        <?php 
          }
        else
          if($conn->query($reg) === TRUE) //si la subida estuvo correcta, le aviso 
                {                        
                ?> 
                <h1> Excelente <?=$_SESSION['usuario_nombre']?>! Su imagen se ha subido correctamente!</h1></br>
                <?php 
                  
                } else { 
                  echo "<script>alert('Ha ocurrido un error y no se subieron las imagenes')
                  ;javascript:history.back();</script>";  //sino, le digo que hubo un error y lo redirecciono a la pagina anterior
              } 

        //compruebo que el archivo ingresado cumpla con los requisitos de una imagen standar
$allowedExts = array("jpg", "jpeg", "gif", "png");
$cadena = explode(".", $_FILES["usuario_img"]["name"]);
$extension = end($cadena);
if ((($_FILES["usuario_img"]["type"] == "image/gif")|| ($_FILES["usuario_img"]["type"] == "image/jpeg")|| ($_FILES["usuario_img"]["type"] == "image/png"))&& ($_FILES["usuario_img"]["size"] < 20000000)&& in_array($extension, $allowedExts))
  {
  //y me fijo si hay algun error
  if ($_FILES["usuario_img"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["usuario_img"]["error"] . "<br />";
    }
  else
    	
	//Si el archivo ya existe en la carpeta, manda una alerta y redirecciona a la pagina anterior
    if (file_exists("img/" . $_FILES["usuario_img"]["name"]))
      {
        ?> 
        
        <script>alert('Ya existe una imagen con ese nombre en el directorio. Intente con otra imagen o pruebe de guardarla con otro nombre.')
        ;window.location='img_subir.php';</script>
        <?php 
      }
    else
      {
	  //sino lo mueve
      move_uploaded_file($_FILES["usuario_img"]["tmp_name"], "img/". $usuario_nombre . '/' . $_FILES["usuario_img"]["name"]);
      
      }
    }
else
  {
  //y sino me dice que el archivo es invalido
  echo "<script>alert('Invalid File.');window.location='img_subir.php';</script>";
  }
         
     
}                            
include('misImagenes.php'); //Incluyo las imagenes que el usuario subio
      ?>
<div class="container-login100-form-btn"> <!--boton por si quiere subir otra imagen-->
						
<form action="img_subir.php" method="post" enctype="multipart/form-data">

			<input type="submit" name="enviar" value="Subir otra imagen" class="login100-form-btn" />
		
    </form>
</div>
    </div>
       <!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="../vendor/daterangepicker/moment.min.js"></script>
	<script src="../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>
 </body>

</html>