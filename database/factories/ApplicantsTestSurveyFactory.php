<?php

namespace Database\Factories;

use App\Models\EntranceTests;
use App\Models\User;
use App\Models\Promos;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ApplicantsTestSurveyFactory extends Factory
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
            'dateSurvey' => $this->faker->date(),
            'mail' => $this->faker->unique()->safeEmail(),
            'entranceTests_id' => EntranceTests::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'promos_id' => Promos::all()->random()->id,
        ];

    }
}