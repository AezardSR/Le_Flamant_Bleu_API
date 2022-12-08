<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Classes;
use App\Models\User;
use App\Models\Categories;
use App\Models\Questions;

class QuestionsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Questions::class;
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