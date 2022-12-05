<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\Classes;
use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionsController extends Controller
{
    public function addQuestion(Request $request)
    {
        $questions = new Questions();
        $questions->question = $request->input('question');

        // $questions->id_classes = Classes::find(
        //     intval(
        //         $request->input('id_classes')
        //     )
        // )->id;

        $questions->id_user = user::find(
            intval(
                $request->input('id_user')
            )
        )->id;
        $questions->save();
        return response()->json($questions);
    }

    public function viewQuestion($id)
    {
        $questions = DB::table('questions')->select('question', 'id_classes', 'id_user', 'id_categories')->where('id','=', $id)->get();
        return response()->json($questions);
    }

    public function viewListQuestion()
    {
        $questions = Questions::all();
        return response()->json($questions);
    }

    public function deleteQuestion($id)
    {
        $questions = Questions::find($id);
        $questions->delete();
        echo('Question bien supprimée');
    }

    public function changeQuestion($id, Request $request)
    {
        $questions = Questions::find($id);
        $questions->question = $request->input('question');

        // $questions->id_classes = Classes::find(
        //     intval(
        //         $request->input('id_classes')
        //     )
        // )->id;

        $questions->id_user = user::find(
            intval(
                $request->input('id_user')
            )
        )->id;
        $questions->save();
        return response()->json($questions);
    }
}
?>