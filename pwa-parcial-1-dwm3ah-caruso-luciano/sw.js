
const cacheName = 'archivos-cineflix';
const assets    = [ 'css/bootstrap.css',
                    'css/estilos.css',
                    'js/main.js',
                    'js/bootstrap.bundle.min.js',
                    'index.php',
                    ];

self.addEventListener('install', event => {
    self.skipWaiting();

    event.waitUntill(
        caches.open(cacheName)
               .then(cache => {
                cache.addAll(assets);
               })
    );
    console.log('SW se instaló correctamente y se realizó el precaching');
})

self.addEventListener('activate', event =>{
    console.log('SW activado');
})

/*
self.addEventListener('fetch', event => {
    event.respondWith(
        caches
            .match(event.request)
            .then(res => {
                if(res){
                    console.log('Error', reqToCache);
                    return res;
                }

                let reqToCache = event.request.clone();

                return fetch(reqToCache)
                    .then(res => {
                        if(!res || res.status !== 200){
                            return res;
                        }
                        let resTocache = res.clone();
                        caches
                            .open(cacheName)
                            .then(cache => {
                                 cache.put(reqToCache, resTocache);
                            })
                        return res;
                    })
            })
    )
})
*/