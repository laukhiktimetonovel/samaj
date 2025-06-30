self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open('v1').then((cache) => {
      return cache.addAll([
        '/',
        '/css/style.css',
        '/js/script.js',
        '/images/logo.png'
      ]).catch((error) => {
        console.error('Cache addAll failed:', error);
      });
    })
  );
});

self.addEventListener('fetch', (event) => {
  if (event.request.method === 'GET' && !event.request.url.includes('/banner/close')) {
    event.respondWith(
      caches.match(event.request).then((response) => {
        if (response) {
          console.log('Serving from cache:', event.request.url);
          return response;
        }
        return fetch(event.request).then((networkResponse) => {
          if (!networkResponse || networkResponse.status !== 200) {
            console.log('Network fetch failed:', event.request.url);
            return caches.match('/');
          }
          return caches.open('v1').then((cache) => {
            cache.put(event.request, networkResponse.clone());
            return networkResponse;
          });
        }).catch((error) => {
          console.error('Fetch failed:', error);
          return caches.match('/');
        });
      })
    );
  }
});
