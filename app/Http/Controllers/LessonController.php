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

class LessonController extends Controller
{
    //Ajouter
    public function addModule($id, $moduleName) {
        $module = new Modules();
        $module->id = $id;
        $module->moduleName = $moduleName;
        $module->save();
        return response()->json($module);
    }

    public function addParts($id, $partName) {
        $parts = new Parts();
        $parts->id = $id;
        $parts->partName = $partName;
        $parts->save();
        return response()->json($parts);
    }

    public function addLesson($id, $contenu, $id_parts) {
        $lesson = new Classes();
        $lesson->id = $id;
        $lesson->contenu = $contenu;
        $lesson->id_parts = $id_parts;
        $lesson->save();
        return response()->json($lesson);
    }

    public function addExercice($id, $name, $contenu, $id_parts) {
        $exercice = new Exercices();
        $exercice->id = $id;
        $exercice->name = $name;
        $exercice->contenu = $contenu;
        $exercice->id_parts = $id_parts;
        $exercice->save();
        return response()->json($exercice);
    }

    public function addCategories($id, $categorie) {
        $categories = new Categories();
        $categories->id = $id;
        $categories->categorie = $categorie;
        $categories->save();
        return response()->json($categories);
    }

    public function addModulesCategories($id_categories, $id_modules) {
        $moduleCategorie = new ModulesCategories();
        $moduleCategorie->id_categories = $id_categories;
        $moduleCategorie->id_modules = $id_modules;
        $moduleCategorie->save();
        return response()->json($moduleCategorie);
    }

    public function addModulesClass($id, $id_classes, $id_modules) {
        $moduleClasse = new ModulesClass();
        $moduleClasse->id = $id;
        $moduleClasse->id_classes = $id_classes;
        $moduleClasse->id_modules = $id_modules;
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
    public function changeModule($id, $moduleName) {
        $module = Modules::find($id);
        $module->id = $id;
        $module->moduleName = $moduleName;
        $module->save();
        return response()->json($module);
    }

    public function changeParts($id, $partName) {
        $parts = Parts::find($id);
        $parts->id = $id;
        $parts->partName = $partName;
        $parts->save();
        return response()->json($parts);
    }

    public function changeLesson($id, $contenu, $id_parts) {
        $lesson = Classes::find($id);
        $lesson->id = $id;
        $lesson->contenu = $contenu;
        $lesson->id_parts = $id_parts;
        $lesson->save();
        return response()->json($lesson);
    }

    public function changeExercice($id, $name, $contenu, $id_parts) {
        $exercice = Exercices::find($id);
        $exercice->id = $id;
        $exercice->name = $name;
        $exercice->contenu = $contenu;
        $exercice->id_parts = $id_parts;
        $exercice->save();
        return response()->json($exercice);
    }

    public function changeCategories($id, $categorie) {
        $categories = Categories::find($id);
        $categories->id = $id;
        $categories->categorie = $categorie;
        $categories->save();
        return response()->json($categories);
    }

    public function changeModulesCategories($id, $id_categories, $id_modules) {
        $moduleCategorie = ModulesCategories::find($id);
        $moduleCategorie->id = $id;
        $moduleCategorie->id_categories = $id_categories;
        $moduleCategorie->id_modules = $id_modules;
        $moduleCategorie->save();
        return response()->json($moduleCategorie);
    }

    public function changeModulesClass($id, $id_classes, $id_modules) {
        $moduleClasse = ModulesClass::find($id);
        $moduleClasse->id = $id;
        $moduleClasse->id_classes = $id_classes;
        $moduleClasse->id_modules = $id_modules;
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
        $exercice = Exercice::all();
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
