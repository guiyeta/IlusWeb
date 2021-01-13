

<?php 

//datos de acceso a nuestra Base de Datos.

    $host_db = "localhost"; // Host de la BD
    $usuario_db = "root"; // Usuario de la BD
    $clave_db = ""; // Contraseña de la BD
    $nombre_db = "sesiones_ilusweb"; // Nombre de la BD
     
    //conectamos y seleccionamos db
    $conn = new mysqli($host_db, $usuario_db, $clave_db, $nombre_db);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
?>
