<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Types;
use App\Models\Roles;
use App\Models\Surveys;
use App\Models\SurveyAnswers;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Types::factory(5)->create();
        Roles::factory(5)->create();
        User::factory(5)->create();
        Surveys::factory(5)->create();
        SurveyAnswers::factory(5)->create();
        
    }
}
