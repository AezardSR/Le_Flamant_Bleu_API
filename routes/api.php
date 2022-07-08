<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\RegistrationController;

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


Route::get('/roles', [RolesController::class, 'getRolesList']);
Route::post('/roles/create/{name}', [RolesController::class, 'addRole']);
Route::get('/types', [RolesController::class, 'getTypesList']);
Route::post('/type/create/{name}', [RolesController::class, 'addTypes']);

Route::get('/registrationTypes', [RegistrationController::class, 'getRegistrationList']);
