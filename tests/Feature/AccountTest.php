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

    protected $accountTested;

    protected $user;

    protected function setUp() : void
    {
        parent::setUp();

        // Creamos una cuenta global para futuras pruebas
        $this->accountTested = $this->validateFields();

        $this->user = User::factory()->make();

    }
    

    public function validateFields($override = [])
    {
        return array_merge([
            'name' => $this->faker->word,
            'category_id' => 1,
            'code' => 15,
            'description' => $this->faker->sentence()
        ], $override);
    }

    /** @test */
    public function an_account_must_have_a_name()
    {
        Passport::actingAs($this->user);

        $this->json('post', 'api/v1/account', $this->validateFields(['name' => '']))
        ->assertStatus(422);
    }

    /** @test */
    public function an_account_must_have_a_code()
    {
        Passport::actingAs($this->user);

        $this->json('post', 'api/v1/account', $this->validateFields(['code' => '']))
        ->assertStatus(422);
    }

    /** @test */
    public function an_account_must_have_a_category()
    {
        Passport::actingAs($this->user);
    
        $this->json('post', 'api/v1/account', $this->validateFields(['category_id' => '']))
        ->assertStatus(422);
    }

    /** @test */
    public function category_must_be_a_number()
    {
        Passport::actingAs($this->user);
        
        $this->json('post', 'api/v1/account', $this->validateFields(['category_id' => 'abc']))
        ->assertStatus(422);
    }

    /** @test */
    public function code_must_be_a_number()
    {
        Passport::actingAs($this->user);
        
        $this->json('post', 'api/v1/account', $this->validateFields(['code' => 'abc']))
        ->assertStatus(422);
    }

    /** @test */
    public function code_must_beguin_with_category_number()
    {
        Passport::actingAs($this->user);

        $this->json('post', 'api/v1/account', $this->validateFields(['code' => '251']))
        ->assertStatus(422);
    }

    /** @test */
    public function an_auth_user_can_create_an_account()
    {
       
        Passport::actingAs($this->user);

        $this->json('post', 'api/v1/account', $this->accountTested)
        ->assertStatus(200);
    }

    /** @test */
    public function an_unidentify_user_cant_create_account()
    {
        $account = Account::factory()->make();

        $this->json('post', 'api/v1/account', $this->accountTested)
        ->assertStatus(401);
    }
}
