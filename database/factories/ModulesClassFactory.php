<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Classes;
use App\Models\Modules;
use App\Models\ModulesClass;

class ModulesClassFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ModulesClass::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'classes_id' =>Classes::all()->random()->id,
            'modules_id' =>Modules::all()->random()->id,
        ];
    }
}