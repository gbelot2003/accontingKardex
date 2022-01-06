<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
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
}
