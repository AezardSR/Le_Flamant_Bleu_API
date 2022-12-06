<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;



class MessagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->text(50),
            'receiver_id' =>User::all()->random()->id,
            'sender_id' =>User::all()->random()->id,
        ];
    }
}