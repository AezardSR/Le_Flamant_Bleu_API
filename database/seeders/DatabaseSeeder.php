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
        $admin_types = new Types();
        $admin_types->name = "Administrateur";
        $admin_types->save();

        $manager_types = new Types();
        $manager_types->name = "Manager";
        $manager_types->save();

        $responsable_types = new Types();
        $responsable_types->name = "Responsable";
        $responsable_types->save();

        $enseignant_types = new Types();
        $enseignant_types->name = "Enseignant";
        $enseignant_types->save();

        $intervenant_types = new Types();
        $intervenant_types->name = "Intervenant";
        $intervenant_types->save();

        $eleve_types = new Types();
        $eleve_types->name = "Elève";
        $eleve_types->save();

        $candidat_types = new Types();
        $candidat_types->name = "Candidat";
        $candidat_types->save();

        $admin_roles = new Roles();
        $admin_roles->name = "Admin";
        $admin_roles->save();

        $directeur_roles = new Roles();
        $directeur_roles->name = "Directeur";
        $directeur_roles->save();

        $chargee_affaire_roles = new Roles();
        $chargee_affaire_roles->name = "Chargé d'affaire";
        $chargee_affaire_roles->save();

        $formateur_roles = new Roles();
        $formateur_roles->name = "Formateur";
        $formateur_roles->save();

        $apprenant_roles = new Roles();
        $apprenant_roles->name = "Apprenant";
        $apprenant_roles->save();

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

        $job = new JobsOffers();
        $job->name = "Développeur Web Full-Stack";
        $job->dateOffers = "2023-04-21";
        $job->description = "Nous recherchons un développeur Web Full-Stack talentueux et passionné pour rejoindre notre équipe dynamique de développement. Le candidat retenu sera responsable de la conception, du développement et de la maintenance de nos sites Web et applications.

        Responsabilités principales :
        
        Conception et développement de sites Web et d'applications
        Développement de fonctionnalités côté serveur et côté client
        Maintenance et amélioration des fonctionnalités existantes
        Analyse et résolution de problèmes de performances et de sécurité
        Collaboration avec les membres de l'équipe pour l'élaboration de solutions innovantes et créatives";

        $job->link = "https://lamanu.fr/";
        $job->user_id = "3";
        $job->partnerContacts_id = "1";
        $job->save();

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

        $actus = new Actualites();
        $actus->title = "La MANU - Nouvelle formation";
        $actus->content = "La MANU est fière d'annoncer le lancement d'un nouveau programme de formation en intelligence artificielle, qui sera offert dès la prochaine rentrée universitaire. Ce programme vise à répondre à la demande croissante de professionnels qualifiés dans le domaine de l'IA, un secteur en constante évolution.
        Les étudiants inscrits au programme auront l'opportunité de suivre des cours sur des sujets tels que l'apprentissage automatique, la vision par ordinateur, le traitement du langage naturel et les réseaux de neurones. Ils auront également accès à des ateliers pratiques et à des projets en équipe, afin de mettre en pratique leurs compétences.";
        $actus->publication_date = "2023-04-21";
        $actus->author = "Jane Doe, journaliste de La Gazette de La MANU";
        $actus->save();

        Actualites::factory(5)->create();

    }
}
