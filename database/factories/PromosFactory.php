<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FormationsTypes;
use App\Models\FormationsFormats;
use App\Models\Promos;

class PromosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Promos::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'startDate' =>$this->faker->date(),
            'endDate' =>$this->faker->date(),
            'duration'=>$this->faker->randomDigit(),
            'formationsTypes_id' => FormationsTypes::all()->random()->id,
            'formationsFormats_id' => FormationsFormats::all()->random()->id
        ];
    }
}