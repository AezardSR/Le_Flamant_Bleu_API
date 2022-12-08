<?php

namespace Database\Factories;

use App\Models\EntranceTests;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;


class EntranceTestsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EntranceTests::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'user_id' =>User::all()->random()->id,
        ];
    }
}