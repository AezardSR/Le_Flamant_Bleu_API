<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use App\Models\Answers;
use App\Models\ApplicantsAnswers;
use App\Models\ApplicantsTestSurvey;
use App\Models\Appointments;
use App\Models\AppointmentsTypes;
use App\Models\Documents;
use App\Models\EmergencyContacts;
use App\Models\EntranceTests;
use App\Models\EntranceTestsSurvey;
use App\Models\Parts;

use App\Models\Exercices;

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
use App\Models\Modules;
use App\Models\Messages;
use App\Models\Classes;
use App\Models\Categories;
use App\Models\FormationsFormats;
use App\Models\FormationsByTypes;
use App\Models\Actualites;

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

        $admin = new User();
        $admin->name = "AdminName";
        $admin->firstname = "AdminFirtName";
        $admin->mail = "admin@test.fr";
        $admin->password = bcrypt("FlamantBleu00!");
        $admin->roles_id = "1";
        $admin->types_id = "1";
        $admin->save();

        User::factory(5)->create();
        Surveys::factory(5)->create();
        SurveyAnswers::factory(5)->create();
        RegistrationTypes::factory(5)->create();
        Categories::factory(10)->create();
        Parts::factory(20)->create();
        PartnerContacts::factory(5)->create();
        Messages::factory(5)->create();
        JobsOffers::factory(5)->create();
        FormationsFormats::factory(5)->create();
        FormationsTypes::factory(5)->create();
        FormationsByTypes::factory(5)->create();
        Modules::factory(2)->create();
        Promos::factory(5)->create();
        PromoTeachers::factory(5)->create();
        PromoStudents::factory(5)->create();
        PromoCalendar::factory(5)->create();
        Registrations::factory(5)->create();
        Signatures::factory(5)->create();
        Exercices::factory(10)->create();
        EntranceTests::factory(5)->create();
        EntranceTestsSurvey::factory(5)->create();
        EmergencyContacts::factory(5)->create();
        Documents::factory(5)->create();
        Classes::factory(10)->create();
        ModulesClass::factory(10)->create();
        ModulesCategories::factory(10)->create();
        Questions::factory(5)->create();
        AppointmentsTypes::factory(5)->create();
        Appointments::factory(5)->create();
        ApplicantsTestSurvey::factory(5)->create();
        ApplicantsAnswers::factory(5)->create();
        Answers::factory(5)->create();
        Actualites::factory(5)->create();

    }
}
