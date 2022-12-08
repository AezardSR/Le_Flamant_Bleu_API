<?php

namespace Database\Factories;

use App\Models\Messages;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;



class MessagesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Messages::class;
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