<?php

namespace Database\Factories;

use App\Models\PartnerContacts;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;



class PartnerContactsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PartnerContacts::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'firstname' => $this->faker->firstName(),
            'mail' => $this->faker->unique()->safeEmail(),
            'tel' => $this->faker->randomNumber(9, true),
            'nameCompany' => $this->faker->word(),
            'user_id' =>User::all()->random()->id,
        ];
    }
}