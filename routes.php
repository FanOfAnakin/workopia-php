<?php

$router->get('/Workopia/public/', 'controllers/home.php');
$router->get('/Workopia/public/listings', 'controllers/listings/index.php');
$router->get('/Workopia/public/listings/create', 'controllers/listings/create.php');
