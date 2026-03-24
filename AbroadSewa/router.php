<?php
// Front controller / router
$uri = strtok($_SERVER['REQUEST_URI'], '?');
$uri = rtrim($uri, '/');
if ($uri === '') $uri = '/';

// Static assets — let Apache handle
if (preg_match('/\.(css|js|png|jpg|jpeg|gif|ico|svg|woff2?|ttf)$/i', $uri)) {
    return false;
}

$routes = [
    '/'                    => 'index.php',
    '/home'                => 'index.php',
    '/about'               => 'about.php',
    '/services'            => 'services.php',
    '/destinations'        => 'destinations.php',
    '/testimonials'        => 'testimonials.php',
    '/contact'             => 'contact.php',
    '/contact-submit'      => 'contact-submit.php',
    '/privacy'             => 'privacy.php',
    '/terms'               => 'terms.php',
];

// Exact match
if (isset($routes[$uri])) {
    require __DIR__ . '/' . $routes[$uri];
    exit;
}

// Destination detail: /destinations/{slug}
if (preg_match('#^/destinations/([a-z0-9\-]+)$#', $uri, $m)) {
    $_GET['destination'] = $m[1];
    $_SERVER['REQUEST_URI'] = $uri;
    require __DIR__ . '/destinations.php';
    exit;
}

// 404
http_response_code(404);
require __DIR__ . '/404.php';
