<?php

//Guarda todos las rutaImg de la tabla de imagenes por orden de la mas reciente primero y las muestra para hacer la galeria
$sql2 = "SELECT rutaImg FROM imagenes ORDER BY img_freq DESC";
$result = $conn->query($sql2);
echo '<div class="row">';
while($row = $result->fetch_assoc())
 {
    echo  '<div class="col-lg-3 col-md-4 col-6">';
    echo  '<a href="php/'. $row['rutaImg'] .'" class="d-block mb-4 h-100">';
    echo  '<img class="img-fluid img-thumbnail" src="php/'. $row['rutaImg'] .'" alt="imagen del usuario">';
    echo  '</a></div>';
  } 
  echo "</div>";
?>