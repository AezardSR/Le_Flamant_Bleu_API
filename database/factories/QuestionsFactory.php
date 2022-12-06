<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Classes;
use App\Models\User;
use App\Models\Categories;


class QuestionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'question' => $this->faker->sentence(6),
            'classes_id' =>Classes::all()->random()->id,
            'user_id' =>User::all()->random()->id,
            'categories_id' =>Categories::all()->random()->id,
        ];
    }
}