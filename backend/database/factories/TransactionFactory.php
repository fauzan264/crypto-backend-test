<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition(): array
    {
        return [
            'id'   => Str::uuid(),
            'user_id' => User::inRandomOrder()->first()->id ?? Str::uuid(),
            'deposit_id' => 'Depo-' . now()->valueOf(),
            'asset'     => 'IDR',
            'amount'    => fake()->numberBetween(100000, 10000000),
            'type'      => 'deposit',
            'status'    => 'success',
            'created_by' => '00000000-0000-0000-0000-000000000000',
            'updated_by' => '00000000-0000-0000-0000-000000000000',
        ];
    }
}
