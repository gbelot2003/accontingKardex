<?php

namespace Tests\Unit;

use App\Models\Account;
use App\Models\JournalEntry;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class JournalEntriesTest extends TestCase
{
    
    /** @test */
    public function a_JE_belongs_to_account()
    {
        $account = Account::factory()->create();
        $je = JournalEntry::factory()->create(['code_id' => $account->code_id]);

        $this->assertInstanceOf(Account::class, $je->account);
    }

    /** @test */
    public function a_JE_belongs_to_a_user()
    {
        $user = User::factory()->create();
        $je = JournalEntry::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(user::class, $je->user);
    }

}
