<?php

$app['router']->get('/', fn () => '<h1>Hello Laravel!</h1>');

$app['router']->get('welcome', ['App\Http\Controllers\WelcomeController', 'index']);
