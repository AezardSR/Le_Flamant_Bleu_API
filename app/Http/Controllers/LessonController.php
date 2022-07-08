<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    //Ajouter un module / un cours / un exercice
    public function addModule($id, $moduleName) {
        $module = new Module();
        $module->id = $id;
        $module->moduleName = $moduleName;
        $module->save();
        return response()->json($module);
    }

    public function addLesson($id, $contenu, $id_parts) {
        $lesson = new Lesson();
        $lesson->id = $id;
        $lesson->contenu = $contenu;
        $lesson->id_parts = $id_parts;
        $lesson->save();
        return response()->json($lesson);
    }

    public function addExercice($id, $name, $contenu, $id_parts) {
        $exercice = new Exercice();
        $exercice->id = $id;
        $exercice->name = $name;
        $exercice->contenu = $contenu;
        $exercice->id_parts = $id_parts;
        $exercice->save();
        return response()->json($exercice);
    }

    //Supprimer un module / un cours / un exercice
    public function deleteModule($id) {
        DB::delete('DELETE FROM t0y2u_modules WHERE id = ?', [$id]);
        echo ("Module supprimé");
    }

    public function deleteLesson($id) {
        DB::delete('DELETE FROM t0y2u_classes WHERE id = ?', [$id]);
        echo ("Leçon supprimée");
    }

    public function deleteExercice($id) {
        DB::delete('DELETE FROM t0y2u_exercices WHERE id = ?', [$id]);
        echo ("Exercice supprimé");
    }

    //Modifier un module / un cours / un exercice
    public function changeModule() {

    }

    public function changeLesson() {

    }

    public function changeExercice() {

    }

    //Voir un module / un cours / un exercice
    public function getModuleList()
    {
        $module = Module::all();
        return response()->json($module);
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
