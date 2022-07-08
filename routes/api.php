<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;
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



Route::get('/roles', [RolesController::class, 'getRolesList']);
Route::post('/roles/{id}/{name}', [RolesController::class, 'addRole']);

Route::get('/exercice', [LessonController::class, 'getExerciceList']);
Route::post('/exercice/{id}/{name}/{content}/{id_parts}', [LessonController::class, 'addExercice']);
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