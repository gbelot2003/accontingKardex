<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

class JournalEntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code_id' => Account::factory()->create()->code,
            'detail' => $this->faker->sentence(), 
            'debit' => $this->faker->randomFloat(2, 10)
        ];
    }

    public function credit()
    {
        return $this->state(function(array $attributes){
            return [
                'credit' => $this->faker->randomFloat(2, 10)
            ];
        });
    }
}
