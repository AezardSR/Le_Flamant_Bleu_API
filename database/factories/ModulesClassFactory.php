<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Classes;
use App\Models\Modules;




class ModulesClassFactory extends Factory
{
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