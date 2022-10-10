<?php  
    // Llave
    $apiKey     = 'c53a9a649be316f1f3a30b7eb2c14c33'; 
    
    //Detalles de la película 
    $pelicula   = file_get_contents('https://api.themoviedb.org/3/movie/'.$_GET['id'].'?api_key='.$apiKey.'&language=es-ARG');
    $pelicula   = json_decode($pelicula, true);

    // Lista de personajes que se interpretan en la película
    $personajes = file_get_contents('https://api.themoviedb.org/3/movie/'.$_GET['id'].'/credits?api_key='.$apiKey.'&language=es-ARG'); 
    $personajes = json_decode($personajes, true);

    // Lista de recomendaciones
    $recomendaciones = file_get_contents('https://api.themoviedb.org/3/movie/'.$_GET['id'].'/recommendations?api_key='.$apiKey.'&language=es-ARG');
    $recomendaciones = json_decode($recomendaciones, true);

    // Ruta de imágenes
    $pathImg   = 'https://image.tmdb.org/t/p/w500/';

    $trailer = true;

    if(isset($pelicula['videos']['results']) && !empty($pelicula['videos']['results'])){
        $video  = $pelicula['videos']['resuts'][0];
    }else{
        $video = false;
    }
    if($video !== false){   
        $key = $video['key'];
        if($video['site'] == 'Youtube'){
            $video = 'https://www.youtube.com/embed/';
        }else{
            $video = 'https://vimeo.com/embed/';
        }
        $video = $video.$key;
    }else{
        $trailer = false;
        $video = 'https://vidsrc.me/embed/' . $pelicula['imdb_id'] . '/'; 
    }
?>

<section class="container-fluid">    
    <div class="peliculas-detalle">
            <img src="<?=$pathImg . $pelicula['poster_path']?>" class="img-fluid" alt="<?=$pelicula['title']?>">
            <div class="datos">
                <h2><?=$pelicula['title']?> (<?=(substr($pelicula['release_date'],0,4))?>)</h2>
                <div class="caract">
                    <span><?= ($pelicula['release_date']);?></span>
                    <?php
                    foreach ($pelicula['genres'] as $generos):
                    ?>
                    <span class="generos"><?= $generos['name']?></span>
                    <?php
                    endforeach;
                    ?>
                    <span><?=$pelicula['runtime']?> min</span>
                    <i class="bi bi-badge-hd-fill"></i>
                </div>
                <p class="tagline"><?=$pelicula['tagline']?></p>
                <h3>Vista general</h3>
                <p><?=$pelicula['overview'];?></p>

                <div class="contenedor-video">
                    <h3><?=(!$trailer) ? 'Ver Online':'Ver Trailer'?></h3>
                    <iframe id="video" src="<?=$video?>" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
    </div>      
</section>

<section class="container-fluid contenedor-actores">
    <h3 class="fs-4">Reparto principal</h3>
            <?php
                foreach($personajes['cast'] as $actores):
            ?>
            <div class="contenedor-card">
                <article class="card">
                    <?php
                    if(is_null($actores['profile_path'])):
                    ?>
                    <img src="img/imagen-no.encontrada.png" class="img-fluid" alt="Imagen no encontrada">
                    <?php
                    else:
                    ?>
                    <img src="<?=$pathImg . $actores['profile_path'];?>" class="card-img-top img-fluid" alt="<?=$actores['name']?>">
                    <?php
                    endif;
                    ?>
                    <div class="card-body">
                        <h4 class="card-title"><?=$actores['name'];?></h4>
                        <p class="card-text text-dark"><?=$actores['character']?></p>
                    </div>
                </article>
            <?php
            endforeach;
            ?>
            </div>
</section>

<section class="container-fluid contenedor-recomendaciones">
    <h3 class="fs-4">Recomendaciones</h3>
        <?php
            foreach($recomendaciones['results'] as $recomendadas):
        ?>
            <div class="contenedor-card">
                <article class="card">
                    <div class="info">
                        <?php
                        if(is_null($recomendadas['backdrop_path'])):
                        ?>
                         <img src="img/imagen-no.encontrada.png" class="img-fluid" alt="Imagen no encontrada">
                        <?php
                        else:
                        ?>
                        <img src="<?=$pathImg . $recomendadas['backdrop_path'];?>" class="card-img-top img-fluid" alt="<?=$recomendadas['title']?>">
                        <?php
                        endif;
                        ?>
                        <div class="card-body d-flex justify-content-between">
                            <h4 class="card-title"><?=$recomendadas['title'];?></h4>
                            <p class="card-text"><?=round($recomendadas['vote_average'],1)?>/10 <i class="bi bi-star-fill"></i></p>
                        </div>
                        <div class="overlay">
                            <div class="play">
                                <a href="index.php?p=DetallesPelicula&id=<?=$recomendadas['id'] . $recomendadas['title']?>"><i class="bi bi-play-circle"></i></a>
                            </div>
                        </div>
                    </div>
                </article>
        <?php
        endforeach;
        ?>
            </div>
</section>

