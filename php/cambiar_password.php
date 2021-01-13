
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
    //Cambiando la contraseña:
    //Con este script, los usuarios pueden cambiar su meail o contraseña
    
    
    session_start();
    include('../acceso_db.php'); // conexion a la BD 
   
    if(isset($_SESSION['usuario_nombre'])) { // comprobamos que la sesion esta iniciada
        
         include("headerGaleria.php");
        
        if(isset($_POST['enviar'])) { 
            if($_POST['usuario_clave'] != $_POST['usuario_clave_conf']) { //si las contraseñas no coinciden (verificacion para el usuario)
                echo "Las password ingresadas no coinciden. <a href='javascript:history.back();'>Reintentar</a>";
            }else { 
                $usuario_nombre = $_SESSION['usuario_nombre']; 
                $usuario_clave = $_POST["usuario_clave"];
                $usuario_clave = md5($usuario_clave); // encriptamos la nueva contraseña con md5 
                $sql = "UPDATE usuarios SET usuario_clave='".$usuario_clave."' WHERE usuario_nombre='".$usuario_nombre."'"; 
                $result = $conn->query($sql);   //Query para actualizar la contraseña la tabla
                
                
                if($result) {
                    echo "<script>alert('Password cambiado correctamente.');window.location='cambiar_password.php';</script>";
                }else { 
                    echo "script>alert('Error: No se pudo cambiar el password.');window.location='cambiar_password.php';</script>";
                } 
            } 
        }else if(isset($_POST['enviar1'])) { 
            
                $usuario_nombre = $_SESSION['usuario_nombre']; 
                $usuario_email = $_POST["usuario_email"];
                $sql = "UPDATE usuarios SET usuario_email='".$usuario_email."' WHERE usuario_nombre='".$usuario_nombre."'"; 
                $result = $conn->query($sql);   //Query para actualizar el mail en la tabla
                
                
                if($result) {
                    echo "<script>alert('Email cambiado correctamente.');window.location='cambiar_password.php';</script>";
                }else { 
                    echo "script>alert('Error: No se pudo cambiar el email.');window.location='cambiar_password.php';</script>";
                } 
            } 
        
            //Formulario de actualizacion de datos
?> 
<div class='container'>
<div class="jumbotron">
    <h1>Cambiar contraseña</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post"> 
            <label>Nuevo Password:</label><br />
            <input type="password" name="usuario_clave" maxlength="15" /><br /> 
            <label>Confirmar:</label><br /> 
            <input type="password" name="usuario_clave_conf" maxlength="15" /><br /> 
            <input type="submit" name="enviar" value="enviar" class="btn btn-danger" style="margin-top:2em;"/>
        </form> 
        <br>
        <h1>Cambiar email</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post"> 
            <label>Nuevo Email:</label><br />
            <input type="email" name="usuario_email"  /><br /> 
            <input type="submit" name="enviar1" value="enviar" class="btn btn-danger" style="margin-top:2em;"/>
        </form> 
        
        </div>
        </div>
<?php 
       
    }else { 
        echo "<script>alert('Acceso denegado');window.location='cambiar_password.php';</script>"; 
    } 
    if($_SESSION['usuario_nombre']=='guiyeta') //si es el administrador me da la opcion de ver informacion del usuario, o eliminarlo
    {
        
      //  echo "<div class='container-fluid'>";
        
        
        ?>
        <div class="container">
        <div class="jumbotron">
        <h1>Eres el administrador del sistema</h1>
            
        

        <div><a href="ver_BD.php">Ver Info de Usuario</a></div>
        <div><a href="delete_BD.php">Eliminar Usuario</a></div>
        
        </div>
        <br>
         </div>
   <?php
    }
?>
</body>
</html>
