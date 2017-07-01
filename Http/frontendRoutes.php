<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->get('contact', [
    'as' => 'public.contact.show',
    'uses' => 'Frontend\ContactRequestController@show',
]);

$router->post('contact', [
    'as' => 'public.contact.submit',
    'uses' => 'Frontend\ContactRequestController@store',
]);
