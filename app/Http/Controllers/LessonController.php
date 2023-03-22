<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Modules;
use App\Models\Exercices;
use App\Models\Lesson;
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
        $parts->name = $request->input('name');

        $parts->categories_id = Categories::find(
            intval(
                $request->input('categories_id')
            )
        )->id;

        $parts->save();
        return response()->json($parts);
    }

    public function addLesson(Request $request) {
        $lesson = new Classes();
        $lesson->name = $request->input('name');
        $lesson->content = $request->input('content');
        $lesson->duration = $request->input('duration');

        $lesson->parts_id = Parts::find(
            intval(
                $request->input('parts_id')
            )
        )->id;

        $lesson->save();
        return response()->json($lesson);
    }

    public function addExercice(Request $request) {
        $exercice = new Exercices();
        $exercice->name = $request->input('name');
        $exercice->content = $request->input('content');
        $exercice->image = $request->input('image');
        $exercice->file = $request->input('file');

        $exercice->parts_id = Parts::find(
            intval(
                $request->input('parts_id')
            )
        )->id;
        
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

        $moduleCategorie->categories_id = Categories::find(
            intval(
                $request->input('categories_id')
            )
        )->id;

        $moduleCategorie->modules_id = Modules::find(
            intval(
                $request->input('modules_id')
            )
        )->id;
        
        $moduleCategorie->save();
        return response()->json($moduleCategorie);
    }

    public function addModulesClass(Request $request) {
        $moduleClasse = new ModulesClass();

        $moduleClasse->classes_id = Classes::find(
            intval(
                $request->input('classes_id')
            )
        )->id;

        $moduleClasse->modules_id = Modules::find(
            intval(
                $request->input('modules_id')
            )
        )->id;

        $moduleClasse->save();
        return response()->json($moduleClasse);
    }

    //Supprimer
    public function deleteModule($id) {
        $module = Modules::find($id);
        $module->delete();
    }

    public function deleteParts($id) {
        $parts = Parts::find($id);
        $parts->delete();
    }

    public function deleteLesson($id) {
        $lesson = Classes::find($id);
        $lesson->delete();
    }

    public function deleteExercice($id) {
        $exercice = Exercices::find($id);
        $exercice->delete();
    }

    public function deleteCategories($id) {
        $categories = Categories::find($id);
        $categories->delete();
    }

    public function deleteModulesCategories($id) {
        $moduleCategorie = ModulesCategories::find($id);
        $moduleCategorie->delete();
    }

    public function deleteModulesClasses($id) {
        $moduleClasses = ModulesClass::find($id);
        $moduleClasses->delete();
    }

    //Modifier
    public function changeModule($id, Request $request) {
        $module = Modules::find($id);
        $module->moduleName = $request->input('module');
        $module->save();
        return response()->json($module);
    }

    public function changeParts($id, Request $request) {
        $parts = Parts::find($id);
        $parts->name = $request->input('name');
        $parts->categories_id = Categories::find(
            intval(
                $request->input('categories_id')
            )
        )->id;
        $parts->save();
        return response()->json($parts);
    }

    public function changeLesson($id, Request $request) {
        $lesson = Classes::find($id);
        $lesson->name = $request->input('name');
        $lesson->content = $request->input('content');
        $lesson->duration = $request->input('duration');

        if ($request->has('parts_id')) {
            $parts_id = intval($request->input('parts_id'));
            $lesson->parts_id = Parts::find($parts_id)->id;
        }

        $lesson->save();
        return response()->json($lesson);
    }

    public function changeExercice($id, Request $request) {
        $exercice = Exercices::find($id);
        $exercice->name = $request->input('name');
        $exercice->content = $request->input('content');
        $exercice->image = $request->input('image');
        $exercice->file = $request->input('file');

        $exercice->parts_id = Parts::find(
            intval(
                $request->input('parts_id')
            )
        )->id;

        $exercice->save();
        return response()->json($exercice);
    }

    public function changeCategories($id, Request $request) {
        $categories = Categories::find($id);
        $categories->categorie = $request->input('categorie');
        $categories->save();
        return response()->json($categories);
    }

    public function changeModulesCategories($id, Request $request) {
        $moduleCategorie = ModulesCategories::find($id);

        $moduleCategorie->categories_id = Categories::find(
            intval(
                $request->input('categories_id')
            )
        )->id;

        $moduleCategorie->modules_id = Modules::find(
            intval(
                $request->input('modules_id')
            )
        )->id;

        $moduleCategorie->save();
        return response()->json($moduleCategorie);
    }

    public function changeModulesClass($id, Request $request) {
        $moduleClasse = ModulesClass::find($id);

        $moduleClasse->classes_id = Classes::find(
            intval(
                $request->input('classes_id')
            )
        )->id;

        $moduleClasse->modules_id = Modules::find(
            intval(
                $request->input('modules_id')
            )
        )->id;

        $moduleClasse->save();
        return response()->json($moduleClasse);
    }


    //Get
    public function getModuleList()
    {
        $module = Modules::all();
        return response()->json($module);
    }

    public function getPartsList()
    {
        $parts = Parts::all();
        return response()->json($parts);
    }

    public function getLessonList()
    {
        $lesson = Classes::all();
        return response()->json($lesson);
    }

    public function getOneLesson($id)
    {
        $lesson = Classes::find($id);
        return response()->json($lesson);
    }

    public function getExerciceList()
    {
        $exercice = Exercices::all();
        return response()->json($exercice);
    }

    public function getOneExercice($id)
    {
        $exercice = Exercices::find($id);
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
