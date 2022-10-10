
<!-- Elegir las imágenes de las películas para el carrusel -->
<section id="carrusel" class="carousel slide" data-bs-ride="false">
      <div class="carousel-indicators">
        <button type="button" 
                data-bs-target="#carrusel" 
                data-bs-slide-to="0" 
                class="active" 
                aria-current="true" 
                aria-label="Imagen 1">
        </button>

        <button type="button" 
                data-bs-target="#carrusel" 
                data-bs-slide-to="1" 
                aria-label="Imagen 2">
        </button>

        <button type="button" 
                data-bs-target="#carrusel" 
                data-bs-slide-to="2" 
                aria-label="Imagen 3">
        </button>
      </div>

      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./img/andor-star-wars.jpg" class="d-block img-fluid" alt="Andor Star Wars">
          <div class="carousel-caption d-none d-md-block">
            <h3 class="fw-bold">Andor <span class="clase">Serie</span></h3>
            <div class="info-banner">
              <span>7.5/10</span>
              <span>2022</span>
              <i class="bi bi-badge-hd-fill"></i>
            </div>
            <p class="fw-bold descripcion-banner">Las aventuras del espía rebelde Cassian Andor durante los años de formación de la Rebelión antes de los eventos de Rogue One: A Star Wars Story. 
               La serie explora historias llenas de espionaje y atrevidas misiones para devolver la esperanza a una galaxia dominada por un imperio despiadado.
            </p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="./img/thor-love-and-thunder.jpg" class="d-block img-fluid" alt="Thor Love and Thunder">
          <div class="carousel-caption d-none d-md-block">
            <h3 class="fw-bold">Thor Love and Thunder <span class="clase">Película</span></h3>
            <div class="info-banner">
              <span>6.8/10</span>
              <span>1h 59m</span>
              <span>2022</span>
              <i class="bi bi-badge-hd-fill"></i>
            </div>
            <p class="fw-bold descripcion-banner">Cuarta película sobre Thor del MCU, en la que el Dios del trueno contará con Lady Thor como acompañante, personaje que interpretará Natalie Portman.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="./img/top-gun-maverick.jpg" class="d-block img-fluid" alt="Top Gun Maverick">
          <div class="carousel-caption d-none d-md-block">
            <h3 class="fw-bold">Top Gun Maverick <span class="clase">Película</span></h3>
            <div class="info-banner">
              <span>8.4/10</span>
              <span>1h 59m</span>
              <span>2022</span>
              <i class="bi bi-badge-hd-fill"></i>
            </div>
            <p class="fw-bold descripcion-banner">Después de más de 30 años de servicio como uno de los mejores aviadores de la Armada, Pete Maverick Mitchel (Tom Cruise) se encuentra dónde siempre quiso estar, empujando los límites como un valiente piloto de prueba y esquivando el alcance en su rango, que no le dejaría volar emplazándolo en tierra.</p>
          </div>
        </div>
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carrusel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carrusel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
      </button>
    </section>

<h1><i class="bi bi-star-fill"></i> Películas Online</h1>
        <section id="contenedorPeliculas">

        </section>
        
        <h2>Series Online</h2>

        <section id="contenedorSeries">

        </section>