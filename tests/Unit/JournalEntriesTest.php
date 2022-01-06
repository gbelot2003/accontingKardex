<?php

namespace Tests\Unit;

use App\Models\Account;
use App\Models\JournalEntry;
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

}
