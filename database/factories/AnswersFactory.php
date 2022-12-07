<?php

namespace Database\Factories;

use App\Models\Questions;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AnswersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'answer' => $this->faker->word(),
            'user_id' => User::all()->random()->id,
            'questions_id' => Questions::all()->random()->id,
        ];

    }
}
