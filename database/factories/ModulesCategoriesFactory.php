<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Modules;
use App\Models\Categories;
use App\Models\ModulesCategories;

class ModulesCategoriesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ModulesCategories::class;
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