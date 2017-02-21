<?php

namespace App\Http\Controllers;

use App\Events\NewRegisteredUserEvent;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    public function registerUser()
    {
       // event(new NewRegisteredUserEvent());

         $user = new \App\User();
        $user->name = 'hola hola';
        $user->email = 'hola@hola.com';

        \Log::info('Before Event');

        event(new Registered($user));

        \Log::info('Afer Event');
        dump("Done!");
    }
}
