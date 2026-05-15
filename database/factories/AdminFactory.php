<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password'), // default password
            'name' => $this->faker->unique()->name(),
            'role_id' => Role::inRandomOrder()->first()?->id ?? Role::factory(),
        ];
    }
}
