<?php

namespace Database\Factories;

use App\Models\Appointments;
use App\Models\AppointmentsTypes;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appointments::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titleDetails' => $this->faker->name(),
            'descriptionDetails' => $this->faker->text(40),
            'dateDetails' => $this->faker->date(),
            'receiver_id' => User::all()->random()->id,
            'create_id' => User::all()->random()->id,
            'appointments_types_id' => AppointmentsTypes::all()->random()->id,
        ];

    }
}
