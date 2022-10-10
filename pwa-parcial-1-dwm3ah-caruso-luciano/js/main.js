 if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('sw.js')
        .then(res => console.log('Se ha registrado correctamente.'))
        .catch(res => console.log('No se ha podido registrar el service worker.'))
}

// Imágenes de cada serie/película 
const pathImg = 'https://image.tmdb.org/t/p/w500/';

// API KEY
const apiKey = 'c53a9a649be316f1f3a30b7eb2c14c33';

/**
 * Realiza la carga de las películas via fetch
 */
const cargarPeliculas = () => {
    fetch(`https://api.themoviedb.org/3/movie/popular?api_key=${apiKey}&language=es-ARG`)
        .then(rta => rta.json())
        .then(data => {
            let contenedorPeliculas = document.getElementById('contenedorPeliculas');
            data.results.forEach(pelicula => {
                const article = document.createElement('article');
                article.setAttribute('card', 'px-1');
                article.innerHTML =  `
                                    <div class="info">
                                        <img src = "${pathImg}${pelicula.poster_path}" class="card-img-top rounded-3 img-fluid" alt = "${pelicula.title}"/>
                                        <div class="card-body">
                                            <h3 class="card-title text-center">${pelicula.title}</h3>
                                            <p class="anio">${(pelicula.release_date).substr(0, 4)}</p>
                                        </div>
                                        <div class="overlay">
                                            <div class="play">
                                                <a href="index.php?p=DetallesPelicula&id=${pelicula.id}&${pelicula.title}"><i class="bi bi-play-circle"></i></a>
                                            </div>
                                            <div class="detalles">
                                                <h3>${pelicula.title}<h3>
                                                <p class="data">
                                                    <span class="votos">${pelicula.vote_average}/10</span>
                                                    <span><i class="bi bi-badge-hd-fill"></i></span>
                                                </p>
                                                <p>${(pelicula.overview).substr(0,340)} [...]</p>
                                            </div>
                                            <div>
                                                <p class="${getColores(pelicula.vote_average)} rating">${pelicula.vote_average} <i class="bi bi-star-fill"></i></p>
                                            </div>
                                        </div>
                                    </div>
                                    `; 
                contenedorPeliculas.appendChild(article);
            })
        })
}
cargarPeliculas();

/**
 * Realiza la carga de las Series via fetch
 */
const cargarSeries = () => {
    fetch(`https://api.themoviedb.org/3/tv/popular?api_key=${apiKey}&language=es-ARG`)
        .then(rta => rta.json())
        .then(data => {
            let contenedorSeries = document.getElementById('contenedorSeries');
            data.results.forEach(serie => {
                const article = document.createElement('article');
                article.setAttribute('card', 'px-1');
                article.innerHTML =  `
                                    <div class="info">
                                        <img src = "${pathImg}${serie.poster_path}" class="card-img-top rounded-3" alt = "${serie.name}"/>
                                        <div class="card-body">
                                            <h3 class="card-title text-center">${serie.name}</h3>
                                            <p class="anio">${(serie.first_air_date).substr(0, 4)}</p>
                                        </div>
                                        <div class="overlay">
                                            <div class="play">
                                                <a href="https://api.themoviedb.org/3/tv/${serie.id}?api_key=${apiKey}&language=es-ARG"><i class="bi bi-play-circle"></i></a>
                                            </div>
                                            <div class="detalles">
                                                <h3>${serie.name}<h3>
                                                <p class="data">
                                                    <span class="votos">${serie.vote_average}/10</span>
                                                    <span><i class="bi bi-badge-hd-fill"></i></span>
                                                </p>
                                                <p>${(serie.overview).substr(0,340)} [...]</p>
                                            </div>
                                            <div>
                                                <p class="${getColores(serie.vote_average)} rating">${serie.vote_average} <i class="bi bi-star-fill"></i></p>
                                            </div>
                                        </div>
                                    </div>
                                    `; 
                contenedorSeries.appendChild(article);
            })
        })
}
cargarSeries();

/**
 * Realiza una selección del color en el que se verá la calificación de una serie/película en base a los votos que poseea la misma.
 * @param {*} calificacion 
 * @returns 
 */
    function getColores(calificacion){
        if (calificacion >= 8){
            return 'green'
        }else if(calificacion >= 5){
            return 'orange'
        }else{
            return 'red'
        }
    }
    
    