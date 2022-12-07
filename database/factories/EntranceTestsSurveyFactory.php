<?php

namespace Database\Factories;

use App\Models\EntranceTests;
use App\Models\Surveys;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;



class EntranceTestsSurveyFactory extends Factory
{
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