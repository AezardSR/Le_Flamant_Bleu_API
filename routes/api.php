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

Route::group(['middleware' => ['jwt.log']], function($router) {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user-profile', [AuthController::class,'userProfile']);  
});
//route pour users
//sert à afficher la liste des utilisateur
Route::get('/users', [UserController::class, 'getUsersList']);
//affiche un seul utilisateur
Route::get('/user/{id}', [UserController::class, 'getOneUser']);
//ajouter un utilisateur
Route::post('/user', [UserController::class, 'addUser']);
Route::put('/user/{id}', [UserController::class, 'editUser']);
Route::delete('/user/{id}', [UserController::class, 'deleteUser']);

//EmergencyContacts
Route::get('/EmergencyContact', [UserController::class, 'getEmergencyContactsList']);
Route::get('/EmergencyContact/{id}', [UserController::class, 'getOneEmergencyContact']);
Route::post('/EmergencyContact', [UserController::class, 'addEmergencyContacts']);
Route::put('/EmergencyContact/{id}', [UserController::class, 'editEmergencyContact']);
Route::delete('/EmergencyContact/{id}', [UserController::class, 'deleteEmergencyContact']);

//rolesController

//Routes pour Roles
Route::get('/roles', [RolesController::class, 'getRolesList']);
Route::post('/roles', [RolesController::class, 'addRole']);
//types
Route::get('/types',[RolesController::class, 'getTypesList']);
Route::post('/types', [RolesController::class, 'addTypes']);

//Routes pour Modules
Route::get('/modules', [LessonController::class, 'getModuleList']);

//Routes pour Documents
Route::get('/documents', [DocumentsController::class, 'getDocuments']);
Route::post('/documents', [DocumentsController::class, 'addDocuments']);
Route::delete('/documents/{id}', [DocumentsController::class, 'deleteDocuments']);
Route::put('/documents/{id}', [DocumentsController::class, 'changeDocuments']);

//Routes pour PartnerContacts
Route::get('/partnercontacts', [PartnerContactController::class, 'getPartnerContact']);
Route::post('/partnercontacts/add', [PartnerContactController::class, 'addPartnerContact']);
Route::delete('/partnercontacts/delete/{id}', [PartnerContactController::class, 'deletePartnerContact']);
Route::put('/partnercontacts/update/{id}', [PartnerContactController::class, 'changePartnerContact']);

//Routes pour JobsOffers
Route::get('/jobsoffers', [JobsOffersController::class, 'getJobsOffers']);
Route::post('/jobsoffers/add', [JobsOffersController::class, 'addJobsOffers']);
Route::delete('/jobsoffers/delete/{id}', [JobsOffersController::class, 'deleteJobsOffers']);
Route::put('/jobsoffers/update/{id}', [JobsOffersController::class, 'changeJobsOffers']);

//Routes pour rendez-vous
    //Type de rdv
Route::put('/PromoStudent/{id}/{column}/{newValue}', [PromoController::class, 'editPromoStudent']);

Route::get('/PromoTeachers', [PromoController::class, 'getPromoTeachersList']);
Route::post('/PromoTeacher', [PromoController::class, 'AddTeacherToPromo']);
Route::get('/PromoTeacher/{id_promos}', [PromoController::class, 'getPromoTeachers']);
Route::put('/PromoTeacher/{id}', [PromoController::class, 'editPromoTeacher']);

Route::get('/PromoCalendars', [PromoController::class, 'getPromoCalendarList']);
Route::post('/PromoCalendar/create/{startDate}/{endDate}/{id_promos}', [PromoController::class, 'AddPromoCalendar']);

// routes pour les questions
Route::get('/questions/{id}', [QuestionsController::class, 'viewQuestion']);
Route::get('/questions', [QuestionsController::class, 'viewListQuestion']);
Route::post('/questions',[QuestionsController::class, 'addQuestion']);
Route::delete('/questions/{id}',[QuestionsController::class, 'deleteQuestion']);
Route::put('/questions/{id}',[QuestionsController::class, 'changeQuestion']);

// routes pour les reponses
Route::get('/answers/{id}', [AnswersController::class, 'viewAnswer']);
Route::get('/answers', [AnswersController::class, 'viewListAnswer']);
Route::post('/answers',[AnswersController::class, 'addAnswer']);
Route::delete('/answers/{id}',[AnswersController::class, 'deleteAnswer']);
Route::put('/answers/{id}',[AnswersController::class, 'changeAnswer']);

/*
Route::get('/partnerscontacts', [PartnerContactController::class, '//NameFunction']);v
Route::get('/offres-emplois', [JobsOffersController::class, '//NameFunction']);
Route::get('/modules', [LessonController::class, '//NameFunction']);
Route::get('/cours', [LessonController::class, '//NameFunction']);
Route::get('/exercices', [LessonController::class, '//NameFunction']);
Route::get('/planning', [CalendarController::class, '//NameFunction']);
Route::get('/messagerie', [MessagesController::class, '//NameFunction']);
 */