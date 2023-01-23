<?php

namespace Database\Factories;

use App\Models\Exercices;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Parts;


class ExercicesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Exercices::class;
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
            'parts_id' => Parts::all()->random()->id,
            

        ];
    }
}