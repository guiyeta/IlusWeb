<!DOCTYPE html> 
<html lang="es">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/carrousel.css">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, initial-scale-1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<head> <title>Subir Imagen</title> 
<link rel="icon" type="image/png" href="../img/logo.png">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head> 
<body> 
<div class="conteiner-fluid">
<?php  //EN esta pagina el usuario puede subir una imagen al servidor y registrarla en la bd
    session_start();
    include('../acceso_db.php'); // inclyo los datos de conexion a la BD 

    if(isset($_SESSION['usuario_nombre'])) { // compruebo que la sesion este iniciada

        $usuario_nombre = $_SESSION['usuario_nombre']; //variable con el nombre del usuario
        include("headerGaleria.php");         //Incluyo el header
     } 
 
?>

		
			<div class="wrap-login100"> <!--formulario para subir una imagen -->
        <form action="img.php" method="post" enctype="multipart/form-data" class="login100-form validate-form">
        <span class="login100-form-title p-b-34">
			Subir una imagen
		</span>
     <div>
        <input type="file" name="usuario_img" id="file" class="btn btn-danger" style="margin:2em;"/> 
    </div>
    <div>
        <input type="submit" name="enviar" value="Enviar" class="btn btn-danger text-center"style="margin:2em;"/>
    
	</div>
    </form>

</div>



		

</div>

</body> 
</html>