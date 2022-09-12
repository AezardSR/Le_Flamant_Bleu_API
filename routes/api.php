<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\TestsController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
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
Route::get('/', [UserController::class, 'getEmergencyContactsList']);
Route::post('/EmergeEmergencyContactsncyContact/{name}/{firstname}/{tel}/{id_users}', [UserController::class, 'addEmergencyContacts']);
Route::get('/EmergencyContact/{id}', [UserController::class, 'getOneEmergencyContact']);
Route::put('/EmergencyContact/update/{id}/{column}/{newValue}', [UserController::class, 'editEmergencyContact']);
Route::delete('/EmergencyContact/delete/{id}', [UserController::class, 'deleteEmergencyContact']);

//rolesController
Route::get('/roles', [RolesController::class, 'getRolesList']);
Route::post('/roles/create/{name}', [RolesController::class, 'addRole']);
Route::get('/types', [RolesController::class, 'getTypesList']);
Route::post('/type/create/{name}', [RolesController::class, 'addTypes']);

//RegistrationController
Route::get('/registrationTypes', [RegistrationController::class, 'getRegistrationTypeList']);
Route::get('/registrations', [RegistrationController::class, 'getRegistrationsList']);
Route::get('/registration/{id}', [RegistrationController::class, 'getOneRegistration']);
Route::post('/registration/create/{dateRegistration}/{detailRegistration}/{id_promos}/{id_registrationTypes}', [RegistrationController::class, 'createRegistration']);
Route::put('/registration/update/{id}/{column}/{newValue}', [RegistrationController::class, 'editRegistration']);
Route::put('/registrationType/update/{id}/{column}/{newValue}', [RegistrationController::class, 'editRegistrationType']);
Route::get('/signatures/{id_registration}', [RegistrationController::class, 'getSignatureList']);
Route::post('/signatures/{id_users}/{id_registrations}/{date}', [RegistrationController::class, 'addSignature']);

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
