<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Account;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccountTest extends TestCase
{
    use RefreshDatabase,  WithFaker;

    /** @test */
    public function account_belong_to_categories()
    {
        
        $category = Category::find(1);
        
        $account = Account::factory()->create([
            'category_id' => $category->id
        ]);

        $this->assertEquals($category->name, $account->category->name);
    }
}
