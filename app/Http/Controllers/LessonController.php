<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Modules;
use App\Models\Exercices;
use App\Models\Parts;
use App\Models\Categories;
use App\Models\ModulesCategories;
use App\Models\ModulesClass;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Validator;


class LessonController extends Controller
{
    //Ajouter

    /**
     * Store a new blog post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addModule(Request $request) {
        $module = new Modules();
        $module->moduleName = $request->input('module');
        $module->save();
        return response()->json($module);
    }

    public function addParts(Request $request) {
        $parts = new Parts();
        $parts->partName = $request->input('partName');
        $parts->save();
        return response()->json($parts);
    }

    public function addLesson(Request $request) {
        $lesson = new Classes();
        $lesson->name = $request->input('name');
        $lesson->contenu = $request->input('contenu');
        $lesson->id_parts = $request->input(Classes::find('id_parts'));
        $lesson->save();
        return response()->json($lesson);
    }

    public function addExercice(Request $request) {
        $exercice = new Exercices();
        $exercice->name = $request->input('name');
        $exercice->contenu = $request->input('contenu');
        // $exercice->id_parts = $request->input(Exercices::find('id_parts'));
        $exercice->id_parts = Exercices::find($request->input('id_parts'));
        $exercice->save();
        return response()->json($exercice);
    }

    public function addCategories(Request $request) {
        $categories = new Categories();
        $categories->categorie = $request->input('categorie');
        $categories->save();
        return response()->json($categories);
    }

    public function addModulesCategories(Request $request) {
        $moduleCategorie = new ModulesCategories();
        $moduleCategorie->id_categories = $request->input(ModulesCategories::find('id_categories'));
        $moduleCategorie->id_modules = $request->input(ModulesCategories::find('id_modules'));
        $moduleCategorie->save();
        return response()->json($moduleCategorie);
    }

    public function addModulesClass(Request $request) {
        $moduleClasse = new ModulesClass();
        $moduleClasse->id_classes = $request->input(ModulesClass::find('id_classes'));
        $moduleClasse->id_modules = $request->input(ModulesClass::find('id_modules'));
        $moduleClasse->save();
        return response()->json($moduleClasse);
    }

    //Supprimer
    public function deleteModule($id) {
        $module = Modules::find($id);
        $module->delete();
        echo('Module bien supprimé');
    }

    public function deleteParts($id) {
        $parts = Parts::find($id);
        $parts->delete();
        echo('Partie bien supprimé');
    }

    public function deleteLesson($id) {
        $lesson = Classes::find($id);
        $lesson->delete();
        echo('Leçon bien supprimé');
    }

    public function deleteExercice($id) {
        $exercice = Exercices::find($id);
        $exercice->delete();
        echo('Exercice bien supprimé');
    }

    public function deleteCategories($id) {
        $categories = Categories::find($id);
        $categories->delete();
        echo('Catégorie est bien supprimée');
    }

    public function deleteModulesCategories($id) {
        $moduleCategorie = ModulesCategories::find($id);
        $moduleCategorie->delete();
        echo('Module de la catégorie est bien supprimé');
    }

    public function deleteModulesClasses($id) {
        $moduleClasses = ModulesClass::find($id);
        $moduleClasses->delete();
        echo('Module de la classe est bien supprimé');
    }

    //Modifier
    public function changeModule(Request $request) {
        $module = Modules::find($id);
        $module->moduleName = $request->input('module');
        $module->save();
        return response()->json($module);
    }

    public function changeParts(Request $request) {
        $parts = Parts::find($id);
        $parts->partName = $request->input('partName');
        $parts->save();
        return response()->json($parts);
    }

    public function changeLesson(Request $request) {
        $lesson = Classes::find($id);
        $lesson->name = $request->input('name');
        $lesson->contenu = $request->input('contenu');
        $lesson->id_parts = $request->input(Classes::find('id_parts'));
        $lesson->save();
        return response()->json($lesson);
    }

    public function changeExercice(Request $request) {
        $exercice = Exercices::find($id);
        $exercice->name = $request->input('name');
        $exercice->contenu = $request->input('contenu');
        $exercice->id_parts = $request->input(Exercices::find('id_parts'));
        $exercice->save();
        return response()->json($exercice);
    }

    public function changeCategories(Request $request) {
        $categories = Categories::find($id);
        $categories->categorie = $request->input('categorie');
        $categories->save();
        return response()->json($categories);
    }

    public function changeModulesCategories(Request $request) {
        $moduleCategorie = ModulesCategories::find($id);
        $moduleCategorie->id_categories = $request->input(ModulesCategories::find('id_categories'));
        $moduleCategorie->id_modules = $request->input(ModulesCategories::find('id_modules'));
        $moduleCategorie->save();
        return response()->json($moduleCategorie);
    }

    public function changeModulesClass(Request $request) {
        $moduleClasse = ModulesClass::find($id);
        $moduleClasse->id_classes = $request->input(ModulesClass::find('id_classes'));
        $moduleClasse->id_modules = $request->input(ModulesClass::find('id_modules'));
        $moduleClasse->save();
        return response()->json($moduleClasse);
    }


    //Get
    public function getModuleList()
    {
        $module = Module::all();
        return response()->json($module);
    }

    public function getPartsList()
    {
        $parts = Parts::all();
        return response()->json($parts);
    }

    public function getLessonList()
    {
        $lesson = Lesson::all();
        return response()->json($lesson);
    }

    public function getExerciceList()
    {
        $exercice = Exercices::all();
        return response()->json($exercice);
    }

    public function getCategoriesList()
    {
        $categories = Categories::all();
        return response()->json($categories);
    }

    public function getModulesCategoriesList()
    {
        $moduleCategorie = ModulesCategories::all();
        return response()->json($moduleCategorie);
    }

    public function getModulesClassesList()
    {
        $moduleClasses = ModulesClass::all();
        return response()->json($moduleClasses);
    }

}
