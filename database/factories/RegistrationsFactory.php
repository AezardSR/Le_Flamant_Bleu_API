<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Promos;
use App\Models\Registrations;
use App\Models\RegistrationTypes;

class RegistrationsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Registrations::class;
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
            'registrationTypes_id' => RegistrationTypes::all()->random()->id
        ];
    }
}