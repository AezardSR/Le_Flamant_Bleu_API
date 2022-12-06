<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Promos;



class PromoTeachersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'teachers_id' =>User::all()->random()->id,
            'promos_id' =>Promos::all()->random()->id,
        ];
    }
}