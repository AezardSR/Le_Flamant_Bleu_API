<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Modules;
use App\Models\Categories;




class ModulesCategoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'categories_id' =>Categories::all()->random()->id,
            'modules_id' =>Modules::all()->random()->id,
        ];
    }
}