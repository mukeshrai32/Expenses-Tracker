<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word(),
            // 'description'=> fake()->text(),
            'description' => fake()->sentence(),
            'category_id' => fake()->randomDigitNotNull(),
            'quantity' => fake()->randomFloat(2, 1, 50),
            'expense_amount' => fake()->randomFloat(2, 50, 2000),
            // 'created_by' => User::factory(),
            'created_by' => fake()->numberBetween(1, 55)
        ];
    }
}
