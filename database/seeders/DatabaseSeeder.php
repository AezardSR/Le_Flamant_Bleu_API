<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use App\Models\FormationsTypes;
use App\Models\JobsOffers;
use App\Models\ModulesCategories;
use App\Models\ModulesClass;
use App\Models\PartnerContacts;
use App\Models\PromoCalendar;
use App\Models\User;
use App\Models\Types;
use App\Models\Roles;
use App\Models\Surveys;
use App\Models\SurveyAnswers;
use App\Models\Signatures;
use App\Models\Registrations;
use App\Models\RegistrationTypes;
use App\Models\Promos;
use App\Models\PromoStudents;
use App\Models\PromoTeachers;
use App\Models\Questions;
use App\Models\Parts;
use App\Models\Modules;
use App\Models\Messages;

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
        Promos::factory(5)->create();
        Registrations::factory(5)->create();
        Signatures::factory(5)->create();
        RegistrationTypes::factory(5)->create();
        Questions::factory(5)->create();
        PromoTeachers::factory(5)->create();
        PromoStudents::factory(5)->create();
        PromoCalendar::factory(5)->create();
        Parts::factory(5)->create();
        PartnerContacts::factory(5)->create();
        ModulesClass::factory(5)->create();
        ModulesCategories::factory(5)->create();
        Modules::factory(5)->create();
        Messages::factory(5)->create();
        JobsOffers::factory(5)->create();
        FormationsTypes::factory(5)->create();
        
        
    }
}
