<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Account;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccountTest extends TestCase
{   
    use RefreshDatabase, WithFaker;

    /** @test */
    public function an_auth_user_can_create_an_account()
    {
        $account = Account::factory()->make();
        $user = User::factory()->make();
       
        Passport::actingAs($user);

        $this->json('post', 'api/account', $account->toArray())
        ->assertStatus(200);

    }
}
