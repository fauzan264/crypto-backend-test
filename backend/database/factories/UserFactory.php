<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id'                => Str::uuid(),
            'name'              => fake()->name(),
            'username'          => fake()->userName(),
            'email'             => fake()->unique()->safeEmail(),
            'password_hash'     => static::$password ??= Hash::make('password'),
            'status'            => 'active',
            'user_role_id'      => '103bba1a-4174-4788-9052-4ca4098fb4c1',
            'created_by'        => '00000000-0000-0000-0000-000000000000',
            'updated_by'        => '00000000-0000-0000-0000-000000000000',
        ];
    }

}
