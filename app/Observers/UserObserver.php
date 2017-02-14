<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 14/02/17
 * Time: 21:40
 */

namespace app\Observers;


use App\Mail\WelcomeEmailMarkdown;
use App\User;
use Illuminate\Support\Facades\Mail;

class UserObserver
{

    public function created(User $user)
    {
        dd("prova");
        //Mail::to($user->email)->send(new WelcomeEmailMarkdown($user));
    }

}