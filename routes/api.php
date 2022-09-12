<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PartnerContactController;
use App\Http\Controllers\JobsOffersController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DocumentsController;

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