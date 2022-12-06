<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Promos;
use App\Models\User;




class PromoStudentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'students_id'=>User::all()->random()->id,
            'promos_id'=>Promos::all()->random()->id,
        ];
    }
}