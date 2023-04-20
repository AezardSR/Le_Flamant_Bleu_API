<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Answers;
use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswersController extends Controller
{
    /**
     * @OA\Post(
     *      path="/answers",
     *      operationId="addAnswer",
     *      tags={"Answers"},
     *      security={{"bearerAuth":{}}},
     *      summary="Ajouter une reponse",
     *      description="Ajouter une reponse",
     *      @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="answer",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="user_id",
     *                          type="integer"
     *                      ),
     *                       @OA\Property(
     *                          property="questions_id",
     *                          type="integer"
     *                      )
     *                 ),
     *                 example={
     *                     "answer":"ajouter un document",
     *                     "user_id":1,
     *                     "questions_id":3
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *     ),
     *  )
     */
    public function addAnswer(Request $request)
    {
        $answers = new Answers();
        $answers->answer = $request->input('answer');

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
  /**
     * @OA\Get (
     *      path="/answers/{id}",
     *      operationId="viewAnswer",
     *      tags={"Answers"},
 *     security={{"bearerAuth":{}}},
     * 
     *      summary="Voir une reponse en fonction de son ID",
     *      description="Voir une reponse en fonction de son ID",
     *     @OA\Parameter (
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema (
     *           type="integer"
     *      )
     *   ),
     *      @OA\Response (
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
     */
    public function viewAnswer($id)
    {
        $answers = DB::table('answers')->select('answer', 'questions_id', 'user_id')->where('id','=', $id)->get();
        return response()->json($answers);
    }

     /**
     * @OA\Get(
     *      path="/answers",
     *      operationId="viewListAnswer",
     *      tags={"Answers"},
     *      security={{"bearerAuth":{}}},
     *      summary="Voir toutes les reponses",
     *      description="Voir toutes les reponses",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
     */
    public function viewListAnswer()
    {
        $answers = Answers::all();
        return response()->json($answers);
    }
  /**
     * @OA\Delete (
     *      path="/answers/{id}",
     *      operationId="deleteAnswer",
     *      tags={"Answers"},
     *      security={{"bearerAuth":{}}},
     *      summary="Supprimer une reponse",
     *      description="Supprimer une reponse avec son ID",
     *     @OA\Parameter (
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema (
     *           type="integer"
     *      )
     *   ),
     *      @OA\Response (
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
     */
    public function deleteAnswer($id)
    {
        $answers = Answers::find($id);
        $answers->delete();
    }

    /**
     * @OA\Patch (
     *      path="/answers/{id}",
     *      operationId="changeAnswer",
     *      tags={"Answers"},
     *      security={{"bearerAuth":{}}},
     *      summary="modifier une reponse",
     *      description="Permets de modifier une reponse",
     *     @OA\Parameter (
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema (
     *           type="integer",
     *      ),
     * ),
     *      *      @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="answer",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="user_id",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="questions_id",
     *                          type="integer"
     *                      )
     *                 ),
     *                 example={
     *                     "answer":"nom document",
     *                      "user_id":1,
     *                      "questions_id":2
     *                }
     *             )
     *         )
     * ),
     *      @OA\Response (
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
     */
    public function changeAnswer($id, Request $request)
    {
        $answers = Answers::find($id);
        $answers->answer = $request->input('answer');

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