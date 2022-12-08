<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Promos;
use App\Models\PromoTeachers;

class PromoTeachersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PromoTeachers::class;
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