
<?php
    
    session_start(); 
    include('acceso_db.php'); // incluiyo los datos de acceso a la BD 
    // compruebo que se haya iniciado la sesion 
    if(isset($_SESSION['usuario_nombre'])) { 
        //se desactiva la sesion de usuario que esta ejecutandose
		session_destroy(); 
        //se redirecciona a la pagina de acceso
		header("Location: index.php"); 
    }else { 
        echo "Operacion incorrecta.";
    } 
?>


