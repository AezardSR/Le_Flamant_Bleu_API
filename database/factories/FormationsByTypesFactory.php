<?php

namespace Database\Factories;

use App\Models\FormationsByTypes;
use App\Models\FormationsFormats;
use App\Models\FormationsTypes;
use Illuminate\Database\Eloquent\Factories\Factory;



class FormationsByTypesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FormationsByTypes::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'formationsTypes_id' =>FormationsTypes::all()->random()->id,
            'formationsFormats_id' =>FormationsFormats::all()->random()->id,
        ];
    }
}