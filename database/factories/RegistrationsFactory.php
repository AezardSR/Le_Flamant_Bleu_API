<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Promos;
use App\Models\RegistrationTypes;

class RegistrationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dateRegistration' => $this->faker->date(),
            'detailRegistration' =>$this->faker->word(),
            'promos_id' => Promos::all()->random()->id,
            'registrationsTypes_id' => RegistrationTypes::all()->random()->id
        ];
    }
}