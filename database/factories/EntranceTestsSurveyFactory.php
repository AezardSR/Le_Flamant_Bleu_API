<?php

namespace Database\Factories;

use App\Models\EntranceTests;
use App\Models\EntranceTestsSurvey;
use App\Models\Surveys;
use Illuminate\Database\Eloquent\Factories\Factory;



class EntranceTestsSurveyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EntranceTestsSurvey::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'entranceTests_id' =>EntranceTests::all()->random()->id,
            'surveys_id' =>Surveys::all()->random()->id,
        ];
    }
}