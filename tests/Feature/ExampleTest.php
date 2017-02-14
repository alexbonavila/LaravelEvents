<?php

namespace Tests\Feature;

use App\Mail\WelcomeEmailMarkdown;
use Event;
use Illuminate\Auth\Events\Registered;
use Mail;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     *
     */
    public function testRegisterUserSendWelcomeEmail()
    {
        Mail::fake();
        $user = new \App\User();
        $user->name = 'hola hola';
        $user->email = 'hola@hola.com';
        event(new Registered($user));
        Mail::assertSent(WelcomeEmailMarkdown::class,function($mail) use ($user)  {
            return ($mail->user->name ===  $user->name) && ($mail->user->email ===  $user->email);
        });
    }
    /**
     *
     */
    public function testRegisterUserSendWelcomeEmail2()
    {
        Event::fake();
        $this->get('/registerUser');
        Event::assertDispatched(Registered::class,function($event)  {
            return $event->user->name === 'hola hola';
        });
    }

//    public function testRegisterUserSendWelcomeEmail()
//    {
//        Event::fake();
//
//        $this->visit('/register')
//            ->type('HOla','name')
//            ->type('hola@hola.com', 'email')
//            ->type('123456', 'password')
//            ->type('123456', 'password_confirmation')
//            ->press('register')
//            ->seePageIs('/home')
//            ->seeInDatabase('users', [
//                'email' => 'hola@hola.com',
//                'name' => 'HOla']);
//
//        Event::assertDispatched(Registered::class,function ($event){
//            return $event->user->name === 'HOla';
//        });
//
//    }
    
}
