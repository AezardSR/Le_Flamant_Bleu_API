<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Promos;


class PromoCalendarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'startDate' => $this->faker->date(),
            'endDate' => $this->faker->date(),
            'promos_id' =>Promos::all()->random()->id
        ];
    }
}