<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.1.9/p5.js" integrity="sha512-rMaqGbYalDaQz0lWNF2L8DHPtf4NW+gSZomExS0LcsNyRS4Rmj21+dt97XfXCZE/E569eX72Bh//Jt1EpStgiA==" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>IlusWeb</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================--> 
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

  </head>
  <body>
<?php

//activo la sesion
    session_start(); 
    include('acceso_db.php'); 
	
	//compruebo que las variables de sesion esten vacias 
    if(empty($_SESSION['usuario_nombre'])) 
    {
			//genero el formulario de acceso 
?>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
        <form class="login100-form validate-form" action="comprobar.php" method="post"> 
        <span class="login100-form-title p-b-34">
						Iniciar sesion
					</span>
        <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
            <input type="text" name="usuario_nombre" id="first-name" class="input100" placeholder="Usuario" required />
            <span class="focus-input100"></span>
            </div>
            
            <div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
            <input class="input100" type="password" name="usuario_clave" placeholder="contraseña" required/>
            <span class="focus-input100"></span>
            </div>

            <div class="container-login100-form-btn">
            <input class="login100-form-btn" type="submit" name="enviar" value="Ingresar" /> 
    </div>

            <div class="w-full text-center p-t-27 p-b-239">
						<span class="txt1">
							
						</span>
					</div>

            <div class="w-full text-center">
						<a href="registro.php" class="txt3">
							Registrarse
						</a>
					</div>
        </form>
        <div class="login100-more" style="background-image: url('img/dibu.jpg');"></div>
		</div>
		</div>
    </div>
    <div id="dropDownSelect1"></div>
	

	
<?php 
	//Si un usuario esta previamente logueado inicio la pagina, la pagina principal es la galeria de imagenes de todos los usuarios
    }
    else
    { ?> </div>
    <div class="container-fluid">
        <?php
        include('php/headerUsuario.php');
        ?>
        <h1 class="font-weight-light text-center text-lg mt-4 mb-0">Imagenes de todos los usuarios</h1>
    </br><div class="container">
        <?php
        include("php/todasImagenes.php");
    }
?>       
 </div>   </div>   
<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

 </body>
 </html> 


