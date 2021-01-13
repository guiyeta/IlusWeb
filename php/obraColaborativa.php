<?php

$imagenes = array();
    //Construyo la Query
       $sql = "SELECT rutaImg FROM imagenes ORDER BY img_freq ASC";
       
       //y luego se la paso a mysql
       $result = $conn->query($sql);
       
       //leo nombre de registros armando una opcion por cada uno
       while ($row = $result->fetch_assoc())
       {
           //lleno el array con los nombres de las imagenes
          array_push($imagenes, $row['rutaImg']);
       }

?>

<script>

<?php
    //cargo un array de php en un array de javascript.
    $js_array = json_encode($imagenes);
    echo "var javascript_array = ". $js_array . ";\n";
?>

//declaro un array para cargar las imagenes
let img = [];

//defino tamaño de la ventana
var w = window.innerWidth;
var h = window.innerHeight;  

//Numero de imagenes que tengo en el array
var numImg = javascript_array.length;

//declaro un array que me va a servir para declarar los objetos
//de la clase Imagen
let imagenes = [];

  function preload() {
    //Creo un loop for para ir llenando los arrays de imagenes

    for (var i=0; i < numImg; i++)
    {
        
        img[i] = loadImage(javascript_array[i]);
    }
    for (var i=0; i < numImg; i++)
    {
        imagenes.push( new Imagen(i, img));
    }
    img.resize(50,0); //adapto un poco el tamaño de las imagenes
  }

  function setup() {
    //canvas
    let lienzo = createCanvas(w-800,h-100);
    lienzo.parent('contenedor-canvas');
  }

  function draw() {
    //fondo blanco
    background(255);
    //centramos las imagenes
    imageMode(CENTER);

    //loop para mostrar las imagenes desde la clase Imagen.
    for (var i = 0; i < numImg; i++)
    {
          imagenes[i].display();
    }
  }

//Acá declaro la clase Imagen
    class Imagen {
        
      constructor(id, img)
      {
        this.x = random(w/4,w)/2;
        this.y = random(h/4, h/2);               
        this.id = id;
        this.img = img;
      }


      //metodo para mostrar las imagenes
      display()
        {
            tint(255,127);
        image(this.img[this.id], this.x, this.y ,this.img[this.id].width ,img[this.id].height);
        
        }
    }
    window.onresize = function() {
  // Asigna valores nuevos cuando varia la pantalla (responsive)
  w = window.innerWidth;
  h = window.innerHeight;  
  canvas.size(w,h);
}
</script>

<div id='contenedor-canvas' class="text-center"></div>