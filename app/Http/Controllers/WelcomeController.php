<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Container;

class WelcomeController
{
    public function index()
    {
        $user = User::first();
        $data = $user->getAttributes();
        // dump($data);
        $app = Container::getInstance();
        $factory = $app->make('view');

        return $factory->make('welcome')->with('data', $data);
    }
}
