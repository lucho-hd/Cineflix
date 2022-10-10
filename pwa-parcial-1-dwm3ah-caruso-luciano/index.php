<?php
  $rutas = [
    'Inicio' => [
      'title' => 'Inicio',
    ],
    'DetallesPelicula' => [
      'title' => 'Detalles Película',
    ],
    '404' => [
      'title' => 'Página no encontrada',
    ],
  ];

  $paginas = $_GET['p'] ?? 'Inicio' ;
  
  if (!isset($rutas[$paginas])){
    $paginas = '404';
  }

  $configuracion = $rutas[$paginas];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineFlix - <?= $configuracion['title']?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="./css/bootstrap.css">
    <!-- Estilos propios -->
    <link rel="stylesheet" href="./css/estilos.css?=1">
    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="./img/icons/favicon.png" type="image/x-icon">
    <!-- Manifiesto -->
    <link rel="manifest" href="manifest.webmanifest">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-nav p-2">
        <div class="container-fluid">
          <a class="navbar-brand mx-5" href="index.php?p=Inicio">
            <img src="img/logo.png" alt="Cineflix">
          </a>
          
          <button class="navbar-toggler" type="button" 
                  data-bs-toggle="collapse" 
                  data-bs-target="#barra_nav" 
                  aria-controls="barra_nav" 
                  aria-expanded="false" 
                  aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse d-lg-flex justify-content-center " id="barra_nav">
            <ul class="navbar-nav fs-5" id="menu">
              <li class="nav-item">
                <a class="nav-link" href="index.php?p=Inicio">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Géneros</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Películas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Series</a>
              </li>
            </ul>
        </div>
      </div>
      <form  class="me-5" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
        <button class="btn btn-buscar" type="submit"><i class="bi bi-search"></i></button>
      </form>
    </nav>
      
    <main class="container-fluid"> 
      <?php
      if(file_exists('./views/' . $paginas . '.php')){
        require __DIR__ .  '/views/' . $paginas . '.php';
      }else{
        require __DIR__ . '/views/404.php';
      }
      ?>
    </main>

    <footer>
      <section class="container-fluid footer-content">
        <div class="footer-brand">
          <img src="./img/logo.png" alt="Logo CineFlix" class="footer-logo">
          <p class="slogan">Series y Películas.</p>
        </div>
        
        <div>
          <h4 class="link-encabezados">Buscar</h4>
          <ul>
            <li class="link-item"><a href="#">TV Shows</a></li>
            <li class="link-item"><a href="#">Películas</a></li>
            <li class="link-item"><a href="#">Niños</a></li>
          </ul>
        </div>
          
        <div>
          <h4 class="link-encabezados">Ayuda</h4>
          <ul>
            <li class="link-item"><a href="#">Mi cuenta</a></li>
            <li class="link-item"><a href="#">Planes</a></li>
            <li class="link-item"><a href="#">Accesibilidad</a></li>
          </ul>
        </div>
          
        <div class="redes">
          <h4 class="link-encabezados">Redes Sociales</h4>
          <ul class="redes-sociales">
            <li><a target ="_blank" href="https://www.instagram.com/"><i class="bi bi-instagram"></i></a></li>
            <li><a target ="_blank" href="https://www.youtube.com/"><i class="bi bi-youtube"></i></a></li>
            <li><a target ="_blank" href="https://www.twitch.tv/"><i class="bi bi-twitter"></i></a></li>
          </ul>
        </div>
        </section>

      <div class="footer-copyright">
        
        <div class="politicas">
          <p>&copy; Copyright 2022 CineFlix</p>
          <a href="#">Política de privacidad</a>
          <a href="#">Términos y condiciones</a>
        </div>

      </div>
    </footer>

    <!-- JS Bootstrap -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- JS Propio -->
    <script src="js/main.js"></script>
</body>
</html>