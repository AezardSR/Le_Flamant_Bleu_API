<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Surveys;

class SurveyAnswersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'answer' => $this->faker->sentence(4),
            'correctAnswer' => $this->faker->randomDigit(),
            'surveys_id' => Surveys::all()->random()->id,
        ];
    }
}