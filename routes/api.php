<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LessonController;

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

//Routes pour Roles
Route::get('/roles', [RolesController::class, 'getRolesList']);
Route::post('/roles/{id}/{name}', [RolesController::class, 'addRole']);

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
// Route::post('/roles', [RolesController::class, 'addRole']);

/*
Route::get('/partnerscontacts', [PartnerContactController::class, '//NameFunction']);
Route::get('/offres-emplois', [JobsOffersController::class, '//NameFunction']);
Route::get('/modules', [LessonController::class, '//NameFunction']);
Route::get('/cours', [LessonController::class, '//NameFunction']);
Route::get('/exercices', [LessonController::class, '//NameFunction']);
Route::get('/planning', [CalendarController::class, '//NameFunction']);
Route::get('/messagerie', [MessagesController::class, '//NameFunction']);
 */
