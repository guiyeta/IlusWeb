<?php
$dir = 'img/'. $usuario_nombre;
$images = glob("$dir{*.gif,*.jpg,*.jpeg,*.JPEG,*.png}", GLOB_BRACE);  
$i=1;
//creo la query
$sql2 = "SELECT rutaImg FROM imagenes WHERE usuario_nb ='$usuario_nombre' ORDER BY img_freq DESC";
$result = $conn->query($sql2);

echo '<div class="row">';
// Completo rutaImg por cada ruta cargada en la base de datos que hayan sido subidas por el usuario que esta con la sesion iniciada
while($row = $result->fetch_assoc())
{
    echo  '<div class="col-lg-3 col-md-4 col-6">';
    echo  '<a href="'. $row['rutaImg'] .'" class="d-block mb-4 h-100">';
    echo  '<img class="img-fluid img-thumbnail" src="'. $row['rutaImg'] .'" alt="imagen del usuario">';
    echo  '</a></div>';
} ;

echo "</div>";

