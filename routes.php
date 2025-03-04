<?php
$router->get('/Workopia/public/', 'HomeController@index');
$router->get('/Workopia/public/listings', 'ListingController@index');
$router->get('/Workopia/public/listings/create', 'ListingController@create');
$router->get('/Workopia/public/listing/{id}', 'ListingController@show');
$router->post('/Workopia/public/listings', 'ListingController@store');

