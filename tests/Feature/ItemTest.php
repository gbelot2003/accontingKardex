<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItemTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $user;
    
    /** @test */
    public function a_user_can_create_items()
    {
        $this->user = User::factory()->make();

        Passport::actingAs($this->user);
        
        $attr = [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
        ];

        
        $this->json('post', 'api/v1/items', $attr)
            ->assertStatus(200);
        
    }
}
