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
use App\Http\Controllers\ActualitesController;



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

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);

Route::group(['middleware' => ['jwt.log']], function($router) {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/refresh', [AuthController::class,'refresh']);  
    Route::get('/user-profile', [AuthController::class,'userProfile']);  
});
//route pour user
//sert à afficher la liste des utilisateur
Route::get('/user', [UserController::class, 'getuserList']);
//affiche un seul utilisateur
Route::get('/user/{id}', [UserController::class, 'getOneUser']);
//ajouter un utilisateur
Route::post('/user', [UserController::class, 'addUser']);
Route::patch('/user/{id}', [UserController::class, 'editUser']);
Route::delete('/user/{id}', [UserController::class, 'deleteUser']);

//emergency-contactss
Route::get('/emergency-contacts', [UserController::class, 'getEmergencyContactsList']);
Route::get('/emergency-contacts/{id}', [UserController::class, 'getOneEmergencyContact']);
Route::post('/emergency-contacts', [UserController::class, 'addEmergencyContacts']);
Route::patch('/emergency-contacts/{id}', [UserController::class, 'editEmergencyContact']);
Route::delete('/emergency-contacts/{id}', [UserController::class, 'deleteEmergencyContact']);

//rolesController

//Routes pour Roles
Route::get('/roles', [RolesController::class, 'getRolesList']);
Route::post('/roles', [RolesController::class, 'addRole']);
//types
Route::get('/types',[RolesController::class, 'getTypesList']);
Route::post('/types', [RolesController::class, 'addTypes']);

//Routes pour Modules
Route::get('/modules', [LessonController::class, 'getModuleList']);
Route::post('/modules', [LessonController::class, 'addModule']);
Route::delete('/modules/{id}/{moduleName}', [LessonController::class, 'deleteModule']);
Route::patch('/modules', [LessonController::class, 'changeModule']);

//Routes pour Parties
Route::get('/parts', [LessonController::class, 'getPartsList']);
Route::get('/parts/{id}', [LessonController::class, 'getOneParts']);
Route::post('/parts', [LessonController::class, 'addParts']);
Route::delete('/parts/{id}', [LessonController::class, 'deleteParts']);
Route::patch('/parts/{id}', [LessonController::class, 'changeParts']);

//RegistrationController
    //Types RegistrationController
    Route::get('/registration-types', [RegistrationController::class, 'getRegistrationTypeList']);
    Route::patch('/registration-types/update/{id}/{column}/{newValue}', [RegistrationController::class, 'editRegistrationType']);

    //Registrations
    Route::get('/registrations', [RegistrationController::class, 'getRegistrationsList']);
    Route::get('/registrations/{id}', [RegistrationController::class, 'getOneRegistration']);
    Route::post('/registrations/create/{dateRegistration}/{detailRegistration}/{id_promos}/{id_registrationTypes}', [RegistrationController::class, 'createRegistration']);
    Route::patch('/registrations/update/{id}/{column}/{newValue}', [RegistrationController::class, 'editRegistration']);

//Signatures
Route::get('/signatures/{id_registration}', [RegistrationController::class, 'getSignatureList']);
Route::post('/signatures/{id_users}/{id_registrations}/{date}', [RegistrationController::class, 'addSignature']);
//Routes pour Leçons
Route::get('/lessons', [LessonController::class, 'getLessonList']);
Route::get('/lessons/{id}', [LessonController::class, 'getOneLesson']);
Route::post('/lessons', [LessonController::class, 'addLesson']);
Route::delete('/lessons/{id}', [LessonController::class, 'deleteLesson']);
Route::patch('/lessons/{id}', [LessonController::class, 'changeLesson']);

//Routes pour Exercices
Route::get('/exercices', [LessonController::class, 'getExerciceList']);
Route::get('/exercices/{id}', [LessonController::class, 'getOneExercice']);
Route::post('/exercices', [LessonController::class, 'addExercice']);
Route::delete('/exercices/{id}', [LessonController::class, 'deleteExercice']);
Route::patch('/exercices/{id}', [LessonController::class, 'changeExercice']);

//Routes pour Catégories
Route::get('/categories', [LessonController::class, 'getCategoriesList']);
Route::get('/categories/{id}', [LessonController::class, 'getOneCategories']);
Route::post('/categories', [LessonController::class, 'addCategories']);
Route::delete('/categories/{id}', [LessonController::class, 'deleteCategories']);
Route::patch('/categories/{id}', [LessonController::class, 'changeCategories']);

//Routes pour Modules Catégories
Route::get('/module-categories', [LessonController::class, 'getModulesCategoriesList']);
Route::post('/module-categories', [LessonController::class, 'addModulesCategories']);
Route::delete('/module-categories/{id}/{id_categories}/{id_modules}', [LessonController::class, 'deleteModulesCategories']);
Route::patch('/module-categories', [LessonController::class, 'changeModulesCategories']);

//Routes pour Modules Classes
Route::get('/module-classes', [LessonController::class, 'getModulesClassesList']);
Route::post('/module-classes', [LessonController::class, 'addModulesClass']);
Route::delete('/module-classes/{id}/{id_classes}/{id_modules}', [LessonController::class, 'deleteModulesClasses']);
Route::patch('/module-classes', [LessonController::class, 'changeModulesClass']);

//Routes pour Documents
Route::get('/documents', [DocumentsController::class, 'getDocuments']);
Route::post('/documents', [DocumentsController::class, 'addDocuments']);
Route::delete('/documents/{id}', [DocumentsController::class, 'deleteDocuments']);
Route::patch('/documents/{id}', [DocumentsController::class, 'changeDocuments']);

//Routes pour PartnerContacts
Route::get('/partner-contacts', [PartnerContactController::class, 'getPartnerContact']);
Route::post('/partner-contacts/add', [PartnerContactController::class, 'addPartnerContact']);
Route::delete('/partner-contacts/delete/{id}', [PartnerContactController::class, 'deletePartnerContact']);
Route::patch('/partner-contacts/update/{id}', [PartnerContactController::class, 'changePartnerContact']);

//Routes pour JobsOffers
Route::get('/job-offers', [JobsOffersController::class, 'getJobsOffers']);
Route::post('/job-offers/add', [JobsOffersController::class, 'addJobsOffers']);
Route::delete('/job-offers/delete/{id}', [JobsOffersController::class, 'deleteJobsOffers']);
Route::patch('/job-offers/update/{id}', [JobsOffersController::class, 'changeJobsOffers']);

//Routes pour rendez-vous
    //Type de rdv
    Route::get('/appointment-types', [CalendarController::class, 'getAppointmentsTypes']);
    Route::post('/appointment-types', [CalendarController::class, 'addAppointmentsTypes']);
    Route::delete('/appointment-types/{id}', [CalendarController::class, 'deleteAppointmentsTypes']);
    Route::patch('/appointment-types', [CalendarController::class, 'changeAppointmentsTypes']);

    //RDV
    Route::get('/appointments', [CalendarController::class, 'getAppointments']);
    Route::post('/appointments', [CalendarController::class, 'addAppointments']);
    Route::delete('/appointments/{id}', [CalendarController::class, 'deleteAppointments']);
    Route::patch('/appointments/{id}', [CalendarController::class, 'changeAppointments']);
//promosController
Route::get('/promos', [PromoController::class, 'getPromosList']);
Route::post('/promos', [PromoController::class, 'createPromo']);
Route::delete('/promos/{id}', [PromoController::class, 'deletePromos']);
Route::get('/promos/{id}', [PromoController::class, 'getOnePromo']);
Route::patch('/promos/{id}', [PromoController::class, 'editPromo']);

Route::get('/promo-students', [PromoController::class, 'getPromoStudentsList']);
Route::post('/promo-students/create/{id_students}/{id_promos}', [PromoController::class, 'AddStudentToPromo']);
Route::get('/promo-students/{id_promos}', [PromoController::class, 'getPromoStudents']);
Route::patch('/promo-students/{id}/{column}/{newValue}', [PromoController::class, 'editPromoStudent']);

Route::get('/promo-teachers', [PromoController::class, 'getPromoTeachersList']);
Route::post('/promo-teachers', [PromoController::class, 'AddTeacherToPromo']);
Route::get('/promo-teachers/{promos_id}', [PromoController::class, 'getPromoTeachers']);
Route::put('/promo-teachers/{id}', [PromoController::class, 'editPromoTeacher']);

Route::get('/promo-calendars', [PromoController::class, 'getPromoCalendarList']);
Route::post('/promo-calendars/create/{startDate}/{endDate}/{id_promos}', [PromoController::class, 'AddPromoCalendar']);
Route::get('/promo-calendars/{id_promos}', [PromoController::class, 'getPromoCalendar']);
Route::patch('/promo-calendars/{id}/{column}/{newValue}', [PromoController::class, 'editPromoCalendar']);

Route::get('/promo-types', [PromoController::class, 'getPromosTypes']);
Route::get('/promo-formats', [PromoController::class, 'getPromosFormat']);

//testsController
Route::get('/applicant-test-surveys', [TestsController::class, 'getApplicantsTestSurveyList']);
Route::post('/applicant-test-surveys/create/{name}/{firstname}/{dateSurvey}/{mail}/{id_entranceTests}/{id_formationsFormats}/{id_promos}', [TestsController::class, 'createApplicantsTestSurvey']);
Route::get('/applicant-test-surveys/{id}', [TestsController::class, 'getOneApplicantsTestSurvey']);
Route::patch('/applicant-test-surveys/{id}/{column}/{newValue}', [TestsController::class, 'editApplicantsTestSurvey']);

Route::get('/applicant-answers', [TestsController::class, 'getApplicantsAnswersList']);
Route::post('/applicant-answers/create/{answer}/{id_surveyAnswers}/{id_applicantsTestSurvey}', [TestsController::class, 'createApplicantsAnswers']);
Route::get('/applicant-answers/{id}', [TestsController::class, 'getApplicantAnswers']);

Route::get('/survey-answers', [TestsController::class, 'getSurveyAnswersList']);
Route::post('/survey-answers/create/{answer}/{correctAnswer}/{id_surveys}', [TestsController::class, 'createSurveyAnswers']);
Route::get('/survey-answers/{id}', [TestsController::class, 'getOneSurveyAnswers']);
Route::patch('/survey-answers/{id}/{column}/{newValue}', [TestsController::class, 'editSurveyAnswers']);

Route::get('/surveys', [TestsController::class, 'getSurveysList']);
Route::post('/surveys/create/{survey}', [TestsController::class, 'createSurveys']);
Route::get('/surveys/{id}', [TestsController::class, 'getOneSurvey']);
Route::patch('/surveys/{id}/{column}/{newValue}', [TestsController::class, 'editSurvey']);

Route::get('/entrance-test-surveys', [TestsController::class, 'getEntranceTestsSurveyList']);
Route::post('/entrance-test-surveys/create/{id_entranceTests}/{id_surveys}', [TestsController::class, 'createEntranceTestsSurvey']);
Route::get('/entrance-test-surveys/{id}', [TestsController::class, 'getOneEntranceTestsSurvey']);
Route::patch('/entrance-test-surveys/{id}/{column}/{newValue}', [TestsController::class, 'editEntranceTestsSurvey']);

//messagingController
Route::post('/messages/create/{content}/{id_receiver}/{id_sender}', [MessagingController::class, 'addMessage']);
Route::get('/messages/{id_receiver}/{id_sender}', [MessagingController::class, 'getChat']);
Route::patch('/messages/{id}/{column}/{newValue}', [MessagingController::class, 'editMessage']);
Route::delete('/messages/delete/{id}', [MessagingController::class, 'deleteMessage']);
	
// routes pour les questions
Route::get('/questions/{id}', [QuestionsController::class, 'viewQuestion']);
Route::get('/questions', [QuestionsController::class, 'viewListQuestion']);
Route::post('/questions',[QuestionsController::class, 'addQuestion']);
Route::delete('/questions/{id}',[QuestionsController::class, 'deleteQuestion']);
Route::patch('/questions/{id}',[QuestionsController::class, 'changeQuestion']);

// routes pour les reponses
Route::get('/answers/{id}', [AnswersController::class, 'viewAnswer']);
Route::get('/answers', [AnswersController::class, 'viewListAnswer']);
Route::post('/answers',[AnswersController::class, 'addAnswer']);
Route::delete('/answers/{id}',[AnswersController::class, 'deleteAnswer']);
Route::patch('/answers/{id}',[AnswersController::class, 'changeAnswer']);

// routes pour les actualités
Route::get('/actualites', [ActualitesController::class, 'getActualites']);
Route::get('/actualites/{id}', [ActualitesController::class, 'getOneActualites']);
Route::post('/actualites',[ActualitesController::class, 'addActualites']);
Route::delete('/actualites/{id}',[ActualitesController::class, 'deleteActualites']);
Route::patch('/actualites/{id}',[ActualitesController::class, 'changeActualites']);