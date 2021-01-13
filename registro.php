<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.1.9/p5.js" integrity="sha512-rMaqGbYalDaQz0lWNF2L8DHPtf4NW+gSZomExS0LcsNyRS4Rmj21+dt97XfXCZE/E569eX72Bh//Jt1EpStgiA==" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>IlusWeb: Registrarse</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="img/logo.png">
<!--===============================================================================================-->
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
  <div class="container-fluid">
<?php 
//Formulario de Registro:

    include('acceso_db.php'); // incluyo el archivo de conexion a la Base de Datos
    
    if(isset($_POST['enviar'])) { // compruebo que se han enviado los datos desde el formulario 

        if($_POST['usuario_clave'] != $_POST['usuario_clave_conf']) 
            { // compruebo que las contraseñas ingresadas coincidan 
                ?>
				<script>alert('Los passwords ingresados no coinciden.'); javascript:history.back();</script>
                <?php
			}
		else 
			{ 
		    //Variables para los inputs posts
            $usuario_nombre = $_POST['usuario_nombre'];
            $usuario_clave = $_POST['usuario_clave'];
            $usuario_email = $_POST['usuario_email']; 
			
            // compruebo que el usuario ingresado no haya sido registrado antes
            $sql = "SELECT usuario_nombre FROM usuarios WHERE usuario_nombre='".$usuario_nombre."'";
            $result = $conn->query($sql);
                
            if ($result->num_rows > 0)
            {   ?>
                    <script> alert('El nombre usuario elegido ya ha sido registrado anteriormente.'); javascript:history.back();</script>
                    <?php   
            }
			else 
			{ 
				//Calcula el hash MD5 de str utilizando el algoritmo de resumen de mensaje MD5 de RSA Data Security, Inc. y devuelve ese hash.
                $usuario_clave = md5($usuario_clave); // encripto la contraseña ingresada con md5 
				
				// ingreso los datos a la BD
                
                
                $reg = "INSERT INTO usuarios (usuario_nombre, usuario_clave, usuario_email, usuario_freg) VALUES ('".$usuario_nombre."', '".$usuario_clave."', '".$usuario_email."', NOW())";
                
                
                if($conn->query($reg) === TRUE)
					{ ?>
						<script>alert('Datos ingresados correctamente. Ya puedes acceder con tu usuario y password a las paginas para usuarios');window.location='index.php';</script>
					
					
					
					
					<?php
					}
				else //Avisa si hay un error
					{ 
						echo "ha ocurrido un error y no se registraron los datos."; 
					} 
            } 
        } 
    }else {
                         
?> 
<!-- Formulario hecho con un template-->
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
            <form class="login100-form validate-form" action="<?=$_SERVER['PHP_SELF']?>" method="post"> 
					<span class="login100-form-title p-b-34">
						Resgistrarse
                    </span>
        
                    <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
                <input id="first-name" class="input100" type="text" name="usuario_nombre" placeholder="Nombre de usuario" title="15 caracteres sin espacio, solo letras" pattern="[a-zA-Z]+" required/>
                <span class="focus-input100"></span>
                    </div>
                    
                    <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
                    <input class="input100" type="email" name="usuario_email" maxlength="50" placeholder="ejemplo@mail.com" required/>
                    <span class="focus-input100"></span>
                    </div>
                    
                    <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type password">
						<input class="input100" type="password" name="usuario_clave" pattern="[a-zA-Z][a-zA-Z0-9-_\.]+" placeholder="Contraseña" required>
						<span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type password">
						<input class="input100" type="password" name="usuario_clave_conf" pattern="[a-zA-Z][a-zA-Z0-9-_\.]+" placeholder="Repetir contraseña" required>
						<span class="focus-input100"></span>
					</div>

                    <div class="container-login100-form-btn">
                    <input class="login100-form-btn" type="submit" name="enviar" value="Registrar" />
					</div>
        
                    <div class="w-full text-center p-t-27 p-b-239">
						<span class="txt1">
						
						</span>
					</div>

					<div class="w-full text-center">
                    <a href="index.php" class="txt3">
							Iniciar seisión
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('img/dibu.jpg');"></div>
			</div>
		</div>
	</div>
        
    <div id="dropDownSelect1"></div> 
        
        
        
    </form> 
    </div>
	</body>
    </html>
<?php 
    } 
?>

