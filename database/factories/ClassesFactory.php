<?php

namespace Database\Factories;

use App\Models\Parts;
use App\Models\Classes;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClassesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Classes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'content' => $this->faker->text(50),
            'duration' => $this->faker->randomDigit(),
            'parts_id' => Parts::all()->random()->id,

        ];

    }
}