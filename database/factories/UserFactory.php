<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Roles;
use App\Models\Types;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

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
            'roles_id' => Roles::all()->random()->id,
            'types_id' => Types::all()->random()->id,
        ];

    }
}
