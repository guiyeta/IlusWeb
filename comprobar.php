<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.1.9/p5.js" integrity="sha512-rMaqGbYalDaQz0lWNF2L8DHPtf4NW+gSZomExS0LcsNyRS4Rmj21+dt97XfXCZE/E569eX72Bh//Jt1EpStgiA==" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Ingresar</title>
  </head>
  <body>
<?php 
//Este es el archivo que comprueba los datos ingresados en el formulario de login

    session_start(); 
    
	include('acceso_db.php'); 
    
	if(isset($_POST['enviar']))
    { // compruebo que se hayan enviado los datos del formulario
        // compruebo que los campos usuarios_nombre y usuario_clave no esten vacios 
        if(empty($_POST['usuario_nombre']) || empty($_POST['usuario_clave']))
        { ?>
            <script> alert('El usuario o la contraseña no han sido ingresadas'); javascript:history.back();</script>
            <?php
        }
        else
        {
            
                $usuario_nombre = $_POST['usuario_nombre'];
                $usuario_clave = $_POST['usuario_clave'];
            
                //Codifica el password
                $usuario_clave = md5($usuario_clave);
            
                // compruebo que los datos ingresados en el formulario coincidan con los de la BD
                $sql = "SELECT usuario_id, usuario_nombre, usuario_clave FROM usuarios WHERE usuario_nombre='".$usuario_nombre."' AND usuario_clave='".$usuario_clave."'";
                
                $result = $conn->query($sql);
            
                if ($result->num_rows > 0)
                    {
                        
                        while($row = $result->fetch_assoc())
                            {
                    
                                $_SESSION['usuario_id'] = $row['usuario_id']; // creo la sesion "usuario_id" y le asignamos como valor el campo usuario_id
                                $_SESSION['usuario_nombre'] = $row["usuario_nombre"]; // creo la sesion "usuario_nombre" y le asignamos como valor el campo usuario_nombre
                                header("Location: index.php");

                            }
                    }
                else {
                        //avisa si la contraseña es incorrecta?> 
                         <script> alert('La contraseña es incorrecta.'); javascript:history.back();</script>
                        <?php
                     }
        }
    }else
    {
        header("Location: index.php");
    }
    
    
?>
</body>
</html>