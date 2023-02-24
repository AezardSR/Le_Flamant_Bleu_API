<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Answers;
use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswersController extends Controller
{
    public function addAnswer(Request $request)
    {
        $answers = new Answers();
        $answers->anwser = $request->input('anwser');

        $answers->questions_id = Questions::find(
            intval(
                $request->input('questions_id')
            )
        )->id;

        $answers->user_id = user::find(
            intval(
                $request->input('user_id')
            )
        )->id;

        $answers->save();
        return response()->json($answers);
    }

    public function viewAnswer($id)
    {
        $answers = DB::table('answers')->select('answer', 'questions_id', 'user_id')->where('id','=', $id)->get();
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

    public function changeAnswer($id, Request $request)
    {
        $answers = Answers::find($id);
        $answers->anwser = $request->input('anwser');

        $answers->questions_id = Questions::find(
            intval(
                $request->input('questions_id')
            )
        )->id;

        $answers->user_id = user::find(
            intval(
                $request->input('user_id')
            )
        )->id;
        $answers->save();
        return response()->json($answers);
    }
}
?>