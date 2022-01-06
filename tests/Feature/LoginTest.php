<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function login_Action()
    {

        $user = User::factory()->create();

        $body = [
            'email' => $user->email,
            'password' => 'password',
        ];

        $this->json('post', 'api/login', $body)
        ->assertStatus(200);
    }   

    /** @test */
    public function a_deactive_user_cant_login()
    {
        $user = User::factory()->disabled()->create();

        $body = [
            'email' => $user->email,
            'password' => 'password',
        ];

        $this->json('post', 'api/login', $body)
        ->assertSee('error')
        ->assertStatus(422);
    }
    
}
