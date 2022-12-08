<?php

namespace Database\Factories;

use App\Models\FormationsFormats;
use Illuminate\Database\Eloquent\Factories\Factory;



class FormationsFormatsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FormationsFormats::class;
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