    <?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PartnerContactController;
use App\Http\Controllers\JobsOffersController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\TestsController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\AnswersController;
use App\Http\Controllers\AuthController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//connexion et inscription

Route::post('/connexion', [AuthController::class, 'login']);
Route::post('/inscription', [AuthController::class, 'register']);

Route::middleware('auth:api')->group(function (){
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class,'userProfile']);  
});
//route pour users
//sert à afficher la liste des utilisateur
Route::get('/users', [UserController::class, 'getUsersList']);
//affiche un seul utilisateur
Route::get('/user/{id}', [UserController::class, 'getOneUser']);
//ajouter un utilisateur
Route::post('/user/{name}/{firstname}/{birthdate}/{mail}/{tel}/{password}/{adress}/{city}/{zipCode}/{id_roles}/{id_types}', [UserController::class, 'addUser']);
Route::put('/user/update/{id}/{column}/{newValue}', [UserController::class, 'editUser']);
Route::delete('/user/delete/{id}', [UserController::class, 'deleteUser']);

//EmergencyContacts
Route::get('/emergencyContacts', [UserController::class, 'getEmergencyContactsList']);
Route::post('/EmergencyContact/{name}/{firstname}/{tel}/{id_users}', [UserController::class, 'addEmergencyContacts']);
Route::get('/EmergencyContact/{id}', [UserController::class, 'getOneEmergencyContact']);
Route::put('/EmergencyContact/update/{id}/{column}/{newValue}', [UserController::class, 'editEmergencyContact']);
Route::delete('/EmergencyContact/delete/{id}', [UserController::class, 'deleteEmergencyContact']);

//rolesController

//Routes pour Roles
Route::get('/roles', [RolesController::class, 'getRolesList']);
Route::post('/roles/{id}/{name}', [RolesController::class, 'addRole']);
//types
Route::get('/types',[RolesController::class, 'getTypesList']);
Route::post('/type/{name}', [RolesController::class, 'addTypes']);

//Routes pour Modules
Route::get('/modules', [LessonController::class, 'getModuleList']);
Route::post('/modules/{id}/{moduleName}', [LessonController::class, 'addModule']);
Route::delete('/modules/{id}/{moduleName}', [LessonController::class, 'deleteModule']);
Route::put('/modules/{id}/{moduleName}', [LessonController::class, 'changeModule']);

//Routes pour Parties
Route::get('/part', [LessonController::class, 'getPartsList']);
Route::post('/part/{id}/{partName}', [LessonController::class, 'addParts']);
Route::delete('/part/{id}/{partName}', [LessonController::class, 'deleteParts']);
Route::put('/part/{id}/{partName}', [LessonController::class, 'changeParts']);

//RegistrationController
Route::get('/registrationTypes', [RegistrationController::class, 'getRegistrationTypeList']);
Route::get('/registrations', [RegistrationController::class, 'getRegistrationsList']);
Route::get('/registration/{id}', [RegistrationController::class, 'getOneRegistration']);
Route::post('/registration/create/{dateRegistration}/{detailRegistration}/{id_promos}/{id_registrationTypes}', [RegistrationController::class, 'createRegistration']);
Route::put('/registration/update/{id}/{column}/{newValue}', [RegistrationController::class, 'editRegistration']);
Route::put('/registrationType/update/{id}/{column}/{newValue}', [RegistrationController::class, 'editRegistrationType']);
Route::get('/signatures/{id_registration}', [RegistrationController::class, 'getSignatureList']);
Route::post('/signatures/{id_users}/{id_registrations}/{date}', [RegistrationController::class, 'addSignature']);
//Routes pour Leçons
Route::get('/leçons', [LessonController::class, 'getLessonList']);
Route::post('/leçons/{id}/{content}/{id_parts}', [LessonController::class, 'addLesson']);
Route::delete('/leçons/{id}/{content}/{id_parts}', [LessonController::class, 'deleteLesson']);
Route::put('/leçons/{id}/{content}/{id_parts}', [LessonController::class, 'changeLesson']);

//Routes pour Exercices
Route::get('/exercice', [LessonController::class, 'getExerciceList']);
Route::post('/exercice/{id}/{name}/{content}/{id_parts}', [LessonController::class, 'addExercice']);
Route::delete('/exercice/{id}/{name}/{content}/{id_parts}', [LessonController::class, 'deleteExercice']);
Route::put('/exercice/{id}/{name}/{content}/{id_parts}', [LessonController::class, 'changeExercice']);

//Routes pour Catégories
Route::get('/categories', [LessonController::class, 'getCategoriesList']);
Route::post('/categories/{id}/{categorie}', [LessonController::class, 'addCategories']);
Route::delete('/categories/{id}/{categorie}', [LessonController::class, 'deleteCategories']);
Route::put('/categories/{id}/{categorie}', [LessonController::class, 'changeCategories']);

//Routes pour Modules Catégories
Route::get('/modulescategories', [LessonController::class, 'getModulesCategoriesList']);
Route::post('/modulescategories/{id}/{id_categories}/{id_modules}', [LessonController::class, 'addModulesCategories']);
Route::delete('/modulescategories/{id}/{id_categories}/{id_modules}', [LessonController::class, 'deleteModulesCategories']);
Route::put('/modulescategories/{id}/{id_categories}/{id_modules}', [LessonController::class, 'changeModulesCategories']);

//Routes pour Modules Classes
Route::get('/modulesclasses', [LessonController::class, 'getModulesClassesList']);
Route::post('/modulesclasses/{id}/{id_classes}/{id_modules}', [LessonController::class, 'addModulesClass']);
Route::delete('/modulesclasses/{id}/{id_classes}/{id_modules}', [LessonController::class, 'deleteModulesClasses']);
Route::put('/modulesclasses/{id}/{id_classes}/{id_modules}', [LessonController::class, 'changeModulesClass']);

//Routes pour Documents
Route::get('/documents', [DocumentsController::class, 'getDocuments']);
Route::post('/documents/{id}/{name}/{id_users}', [DocumentsController::class, 'addDocuments']);
Route::delete('/documents/{id}/{name}/{id_users}', [DocumentsController::class, 'deleteDocuments']);
Route::put('/documents/{id}/{name}/{id_users}', [DocumentsController::class, 'changeDocuments']);

//Routes pour PartnerContacts
Route::get('/partnercontacts', [PartnerContactController::class, 'getPartnerContact']);
Route::post('/partnercontacts/{id}/{name}/{firstname}/{mail}/{tel}/{nameCompany}/{id_users}', [PartnerContactController::class, 'addPartnerContact']);
Route::delete('/partnercontacts/{id}/{name}/{firstname}/{mail}/{tel}/{nameCompany}/{id_users}', [PartnerContactController::class, 'deletePartnerContact']);
Route::put('/partnercontacts/{id}/{name}/{firstname}/{mail}/{tel}/{nameCompany}/{id_users}', [PartnerContactController::class, 'changePartnerContact']);

//Routes pour JobsOffers
Route::get('/jobsoffers', [JobsOffersController::class, 'getJobsOffers']);
Route::post('/jobsoffers/{id}/{name}/{dateOffers}/{description}/{link}/{id_users}/{id_partnerContacts}', [JobsOffersController::class, 'addJobsOffers']);
Route::delete('/jobsoffers/{id}/{name}/{dateOffers}/{description}/{link}/{id_users}/{id_partnerContacts}', [JobsOffersController::class, 'deleteJobsOffers']);
Route::put('/jobsoffers/{id}/{name}/{dateOffers}/{description}/{link}/{id_users}/{id_partnerContacts}', [JobsOffersController::class, 'changeJobsOffers']);

//Routes pour rendez-vous
    //Type de rdv
    Route::get('/appointmentstypes', [CalendarController::class, 'getAppointmentsTypes']);
    Route::post('/appointmentstypes/{id}/{name}', [CalendarController::class, 'addAppointmentsTypes']);
    Route::delete('/appointmentstypes/{id}/{name}', [CalendarController::class, 'deleteAppointmentsTypes']);
    Route::put('/appointmentstypes/{id}/{name}', [CalendarController::class, 'changeAppointmentsTypes']);

    //RDV
    Route::get('/appointments', [CalendarController::class, 'getAppointments']);
    Route::post('/appointments/{id}/{titleDetails}/{descriptionDeatils}/{dateDetails}/{id_receiver}/{id_create}/{id_appointments_types}', [CalendarController::class, 'addAppointments']);
    Route::delete('/appointments/{id}/{titleDetails}/{descriptionDeatils}/{dateDetails}/{id_receiver}/{id_create}/{id_appointments_types}', [CalendarController::class, 'deleteAppointments']);
    Route::put('/appointments/{id}/{titleDetails}/{descriptionDeatils}/{dateDetails}/{id_receiver}/{id_create}/{id_appointments_types}', [CalendarController::class, 'changeAppointments']);
//promosController
Route::get('/Promos', [PromoController::class, 'getPromosList']);
Route::post('/Promo/create/{name}/{startDate}/{endDate}/{duration}/{id_formationsTypes}/{id_formationsFormats}', [PromoController::class, 'createPromo']);
Route::get('/Promo/{id}', [PromoController::class, 'getOnePromo']);
Route::put('/Promo/{id}/{column}/{newValue}', [PromoController::class, 'editPromo']);

Route::get('/PromoStudents', [PromoController::class, 'getPromoStudentsList']);
Route::post('/PromoStudent/create/{id_students}/{id_promos}', [PromoController::class, 'AddStudentToPromo']);
Route::get('/PromoStudent/{id_promos}', [PromoController::class, 'getPromoStudents']);
Route::put('/PromoStudent/{id}/{column}/{newValue}', [PromoController::class, 'editPromoStudent']);

Route::get('/PromoTeachers', [PromoController::class, 'getPromoTeachersList']);
Route::post('/PromoTeacher/create/{id_teachers}/{id_promos}', [PromoController::class, 'AddTeacherToPromo']);
Route::get('/PromoTeacher/{id_promos}', [PromoController::class, 'getPromoTeachers']);
Route::put('/PromoTeacher/{id}/{column}/{newValue}', [PromoController::class, 'editPromoTeacher']);

Route::get('/PromoCalendars', [PromoController::class, 'getPromoCalendarList']);
Route::post('/PromoCalendar/create/{startDate}/{endDate}/{id_promos}', [PromoController::class, 'AddPromoCalendar']);
Route::get('/PromoCalendar/{id_promos}', [PromoController::class, 'getPromoCalendar']);
Route::put('/PromoCalendar/{id}/{column}/{newValue}', [PromoController::class, 'editPromoCalendar']);

//testsController
Route::get('/ApplicantsTestSurvey', [TestsController::class, 'getApplicantsTestSurveyList']);
Route::post('/ApplicantTestSurvey/create/{name}/{firstname}/{dateSurvey}/{mail}/{id_entranceTests}/{id_formationsFormats}/{id_promos}', [TestsController::class, 'createApplicantsTestSurvey']);
Route::get('/ApplicantTestSurvey/{id}', [TestsController::class, 'getOneApplicantsTestSurvey']);
Route::put('/ApplicantTestSurvey/{id}/{column}/{newValue}', [TestsController::class, 'editApplicantsTestSurvey']);

Route::get('/ApplicantsAnswers', [TestsController::class, 'getApplicantsAnswersList']);
Route::post('/ApplicantsAnswer/create/{answer}/{id_surveyAnswers}/{id_applicantsTestSurvey}', [TestsController::class, 'createApplicantsAnswers']);
Route::get('/ApplicantsAnswer/{id}', [TestsController::class, 'getApplicantAnswers']);

Route::get('/SurveyAnswers', [TestsController::class, 'getSurveyAnswersList']);
Route::post('/SurveyAnswer/create/{answer}/{correctAnswer}/{id_surveys}', [TestsController::class, 'createSurveyAnswers']);
Route::get('/SurveyAnswer/{id}', [TestsController::class, 'getOneSurveyAnswers']);
Route::put('/SurveyAnswer/{id}/{column}/{newValue}', [TestsController::class, 'editSurveyAnswers']);

Route::get('/Surveys', [TestsController::class, 'getSurveysList']);
Route::post('/Survey/create/{survey}', [TestsController::class, 'createSurveys']);
Route::get('/Survey/{id}', [TestsController::class, 'getOneSurvey']);
Route::put('/Survey/{id}/{column}/{newValue}', [TestsController::class, 'editSurvey']);

Route::get('/EntranceTestsSurvey', [TestsController::class, 'getEntranceTestsSurveyList']);
Route::post('/EntranceTestsSurvey/create/{id_entranceTests}/{id_surveys}', [TestsController::class, 'createEntranceTestsSurvey']);
Route::get('/EntranceTestsSurvey/{id}', [TestsController::class, 'getOneEntranceTestsSurvey']);
Route::put('/EntranceTestsSurvey/{id}/{column}/{newValue}', [TestsController::class, 'editEntranceTestsSurvey']);

//messagingController
Route::post('/Message/create/{content}/{id_receiver}/{id_sender}', [MessagingController::class, 'addMessage']);
Route::get('/Message/{id_receiver}/{id_sender}', [MessagingController::class, 'getChat']);
Route::put('/Message/{id}/{column}/{newValue}', [MessagingController::class, 'editMessage']);
Route::delete('/message/delete/{id}', [MessagingController::class, 'deleteMessage']);
// routes pour les questions
Route::get('/questions/{id}', [QuestionsController::class, 'viewQuestion']);
Route::get('/questions', [QuestionsController::class, 'viewListQuestion']);
Route::post('/questions/{id}/{question}/{id_classes}/{id_users}',[QuestionsController::class, 'addQuestion']);
Route::delete('/questions/{id}/{question}/{id_classes}/{id_users}',[QuestionsController::class, 'deleteQuestion']);
Route::put('/questions/{id}/{question}/{id_classes}/{id_users}',[QuestionsController::class, 'changeQuestion']);

// routes pour les reponses
Route::get('/answers/{id}', [AnswersController::class, 'viewAnswer']);
Route::get('/answers', [AnswersController::class, 'viewListAnswer']);
Route::post('/answers/{id}/{answer}/{id_questions}/{id_users}',[AnswersController::class, 'addAnswer']);
Route::delete('/answers/{id}/{answer}/{id_questions}/{id_users}',[AnswersController::class, 'deleteAnswer']);
Route::put('/answers/{id}/{answer}/{id_questions}/{id_users}',[AnswersController::class, 'changeAnswer']);

/*
Route::get('/partnerscontacts', [PartnerContactController::class, '//NameFunction']);
Route::get('/offres-emplois', [JobsOffersController::class, '//NameFunction']);
Route::get('/modules', [LessonController::class, '//NameFunction']);
Route::get('/cours', [LessonController::class, '//NameFunction']);
Route::get('/exercices', [LessonController::class, '//NameFunction']);
Route::get('/planning', [CalendarController::class, '//NameFunction']);
Route::get('/messagerie', [MessagesController::class, '//NameFunction']);
 */
