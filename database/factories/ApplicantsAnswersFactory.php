<?php

namespace Database\Factories;

use App\Models\ApplicantsAnswers;
use App\Models\ApplicantsTestSurvey;
use App\Models\SurveyAnswers;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicantsAnswersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ApplicantsAnswers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'answer' => $this->faker->name(),
            'surveyAnswers_id' => SurveyAnswers::all()->random()->id,
            'applicantsTestSurvey_id' => ApplicantsTestSurvey::all()->random()->id,
        ];

    }
}
