<?php

namespace Database\Factories;

use App\Models\PromoCalendar;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Promos;


class PromoCalendarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PromoCalendar::class;
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