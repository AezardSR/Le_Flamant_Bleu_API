<?php
namespace App\Http\Controllers;

use App\Models\Answers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswersController extends Controller
{
    public function addAnswer($id,$answer, $id_questions, $id_users)
    {
        $answers = new Answers();
        $answers->id = $id;
        $answers->answer = $answer;
        $answers->id_questions = $id_questions;
        $answers->id_users = $id_users;
        $answers->save();
        return response()->json($answers);
    }

    public function viewAnswer($id)
    {
        $answers = DB::table('answers')->select('answer', 'id_questions', 'id_users')->where('id','=', $id)->get();
        return response()->json($answers);
    }

    public function viewListAnswer()
    {
        $answers = Answers::all();
        return response()->json($answers);
    }

    public function deleteAnswer($id)
    {
        $answers = Answers::find($id);
        $answers->delete();
        echo('Response bien supprimée');
    }

    public function changeAnswer($id,$answer, $id_questions, $id_users)
    {
        $answers = Answers::find($id);
        $answers->id = $id;
        $answers->answer = $answer;
        $answers->id_questions = $id_questions;
        $answers->id_users = $id_users;
        $answers->save();
        return response()->json($answers);
    }
}
?>