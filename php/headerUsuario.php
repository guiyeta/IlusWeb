<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="img/logo.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    
  </head>
  <body>
 
 <!--Header con nav del sitio, este es utilizado cuando el usuario esta en el index, hice dos headers por la diferencia de los links, que todos los archivos estan en la carpeta de php, 
 y este esta directamente en la carpeta del sitio-->

    <header>
       <nav class="navbar navbar-expand-lg navbar-light bg-danger text-light py-3 main-nav">
          <div class="container">
          <h1>Hola <?=$_SESSION['usuario_nombre']?></h1>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
               
                  <li class="nav-item active">
                    <a class="nav-link text-uppercase" href="php/galeria.php">Obra colaborativa</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-uppercase" href="index.php">Galeria General</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-uppercase" href="php/miGaleria.php">Mi Galeria</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-uppercase" href="php/img_subir.php">Subir Imagen</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-uppercase" href="php/cambiar_password.php">Editar perfil </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-uppercase" href="logout.php">Salir</a>
                  </li>
                  
                </ul>
              </div>
          </div>
        </nav>
    </header>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    
    
  </body>
</html>