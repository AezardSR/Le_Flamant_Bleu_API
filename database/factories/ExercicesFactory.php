<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Parts;


class ExercicesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->word(),
            'content'=> $this->faker->text(50),
            'image'=> $this->faker->text(50),
            'file'=> $this->faker->text(35),
            'parts_id' =>Parts::all()->random()->id,


            

        ];
    }
}