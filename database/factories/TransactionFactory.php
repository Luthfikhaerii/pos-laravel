<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
         return [
            "total_price" => $this->faker->numberBetween(10000, 100000),
            "amount_item" => $this->faker->numberBetween(1, 100),
            "date_transaction" => now()
        ];
    }
}
