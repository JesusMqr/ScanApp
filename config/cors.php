<?php


return [
    'paths' => ['*', 'sanctum/csrf-cookie', '/'],  // Agregar 'posts' en las rutas permitidas si no está presente.
    'allowed_methods' => ['*' ],  // Puedes permitir más métodos según tus necesidades.
    'allowed_origins' => ['*'],
    'allowed_headers' => ['*'],
    'supports_credentials' => true,
];

