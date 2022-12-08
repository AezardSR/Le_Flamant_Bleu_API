<?php

namespace Database\Factories;

use App\Models\Parts;
use Illuminate\Database\Eloquent\Factories\Factory;



class PartsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Parts::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
        ];
    }
}