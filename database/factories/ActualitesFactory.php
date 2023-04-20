<?php

namespace Database\Factories;

use App\Models\Actualites;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ActualitesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Actualites::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'content'=> $this->faker->text(50),
            'publication_date' => $this->faker->date(),
            'author' => $this->faker->name(),
        ];

    }
}
