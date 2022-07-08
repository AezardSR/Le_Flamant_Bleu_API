<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Modules;
use App\Models\Exercices;
use App\Models\Parts;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    //Ajouter un module / un cours / un exercice
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

    //Supprimer un module / un cours / un exercice
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

    //Modifier un module / un cours / un exercice
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

    //Voir un module / un cours / un exercice
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

}
