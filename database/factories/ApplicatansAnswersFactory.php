<?php

namespace Database\Factories;

use App\Models\ApplicantsTestSurvey;
use App\Models\SurveyAnswers;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ApplicantsAnswersFactory extends Factory
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
            'answers' => $this->faker->name(),
            'surveyAnswers_id' => SurveyAnswers::all()->random()->id,
            'applicantsTestSurvey_id' => ApplicantsTestSurvey::all()->random()->id,
        ];

    }
}
