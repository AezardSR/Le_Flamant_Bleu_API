<?php

namespace Database\Factories;

use App\Models\PartnerContacts;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;


class JobsOffersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'dateOffers'=>$this->faker->date(),
            'description'=>$this->faker->text(50),
            'link'=>$this->faker->text(50),
            'user_id' =>User::all()->random()->id,
            'partnerContacts_id' =>PartnerContacts::all()->random()->id,
        ];
    }
}