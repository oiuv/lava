<?php

$app['router']->get('/', function () {
    return '<h1>Hello Laravel!</h1>';
});

$app['router']->get('welcome', ['App\Http\Controllers\WelcomeController', 'index']);
