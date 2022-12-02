<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Roles;
use App\Models\Types;
use Illuminate\Support\Str;

class UsersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'firstname' => $this->faker->firstName(),
            'birthdate' => $this->faker->date(),
            'mail' => $this->faker->unique()->safeEmail(),
            'tel' => $this->faker->randomNumber(9, true),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'zipCode' => $this->faker->randomNumber(5, true),
            'id_roles' => Roles::all()->random()->id,
            'id_types' => Types::all()->random()->id,
        ];

    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
