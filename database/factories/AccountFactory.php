<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category = rand(1, 3);

        return [
            'category_id' => $category,
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'code_id' => $category . rand(1, 5)
        ];
    }
}
