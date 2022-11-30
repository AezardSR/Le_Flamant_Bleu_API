<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionsController extends Controller
{
    // public function addQuestion($id,$question, $id_classes, $id_users)
    // {
    //     $questions = new Questions();
    //     $questions->id = $id;
    //     $questions->question = $question;
    //     $questions->id_classes = $id_classes;
    //     $questions->id_users = $id_users;
    //     $questions->save();
    //     return response()->json($questions);
    // }

    public function addQuestion(Request $request){
        $questions = New Questions();
        $questions->question = $request->input('question');
        $questions->id_classes = $request->input(Questions::find('id_classes'));
        $questions->id_users = $request->input(Questions::find('id_users'));
        $questions->id_categories = $request->input(Questions::find("id_categories"));
        $questions->save();
        return response()->json($questions);
    }

    public function viewQuestion($id)
    {
        $questions = DB::table('questions')->select('question', 'id_classes', 'id_users', 'id_categories')->where('id','=', $id)->get();
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

    // public function changeQuestion($id,$question, $id_classes, $id_users)
    // {
    //     $questions = Questions::find($id);
    //     $questions->id = $id;
    //     $questions->question = $question;
    //     $questions->id_classes = $id_classes;
    //     $questions->id_users = $id_users;
    //     $questions->save();
    //     return response()->json($questions);
    // }
    public function changeQuestion(Request $request, $id){
        $questions = Questions::find($id);
        $questions->question = $request->input('question');
        $questions->id_classes = $request->input(Questions::find('id_classes'));
        $questions->id_users = $request->input(Questions::find('id_users'));
        $questions->id_categories = $request->input(Questions::find("id_categories"));
        $questions->save();
        return response()->json($questions);
    }
}
?>