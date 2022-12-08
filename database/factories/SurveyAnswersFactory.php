<?php

namespace Database\Factories;

use App\Models\SurveyAnswers;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Surveys;

class SurveyAnswersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SurveyAnswers::class;
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