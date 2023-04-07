<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Classes;
use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionsController extends Controller
{

    /**
     * @OA\Post(
     *      path="/questions",
     *      operationId="addQuestion",
     *      tags={"Questions"},

     *      summary="Ajouter une question",
     *      description="Ajouter une question",
     *      @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="question",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="classes_id",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="user_id",
     *                          type="integer"
     *                      ),
     *                       @OA\Property(
     *                          property="categories_id",
     *                          type="integer"
     *                      )
     *                 ),
     *                 example={
     *                     "question":"ajouter un document",
     *                     "classes_id":1,
     *                     "user_id":1,
     *                     "categories_id":3
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
     *      ),
     *  )
     */
    public function addQuestion(Request $request)
    {
        $questions = new Questions();
        $questions->question = $request->input('question');

        // $questions->classes_id = Classes::find(
        //     intval(
        //         $request->input('classes_id')
        //     )
        // )->id;

        $questions->user_id = User::find(
            intval(
                $request->input('user_id')
            )
        )->id;
        $questions->save();
        return response()->json($questions);
    }
  /**
     * @OA\Get (
     *      path="/questions/{id}",
     *      operationId="viewQuestion",
     *      tags={"Questions"},
     *      summary="Voir une question en fonction de son ID",
     *      description="Voir une question en fonction de son ID",
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
    public function viewQuestion($id)
    {
        $questions = DB::table('questions')->select('question', 'classes_id', 'user_id', 'categories_id')->where('id','=', $id)->get();
        return response()->json($questions);
    }

        /**
     * @OA\Get(
     *      path="/questions",
     *      operationId="viewListQuestion",
     *      tags={"Questions"},

     *      summary="Voir toutes les questions",
     *      description="Voir toutes les questions",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
     */
    public function viewListQuestion()
    {
        $questions = Questions::all();
        return response()->json($questions);
    }

  /**
     * @OA\Delete (
     *      path="/questions/{id}",
     *      operationId="deleteQuestion",
     *      tags={"Questions"},
     *      summary="Supprimer une question",
     *      description="Supprimer une question avec son ID",
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
    public function deleteQuestion($id)
    {
        $questions = Questions::find($id);
        $questions->delete();
    }
    /**
     * @OA\Patch (
     *      path="/questions/{id}",
     *      operationId="changeQuestion",
     *      tags={"Questions"},
     *      summary="modifier une question",
     *      description="Permets de modifier une question",
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
     *                          property="question",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="classes_id",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="user_id",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="categories_id",
     *                          type="integer"
     *                      )
     *                 ),
     *                 example={
     *                     "question":"nom document",
     *                      "classes_id":2,
     *                      "user_id":1,
     *                      "categories_id":2
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
    public function changeQuestion($id, Request $request)
    {
        $questions = Questions::find($id);
        $questions->question = $request->input('question');

        // $questions->classes_id = Classes::find(
        //     intval(
        //         $request->input('classes_id')
        //     )
        // )->id;

        $questions->user_id = User::find(
            intval(
                $request->input('user_id')
            )
        )->id;
        $questions->save();
        return response()->json($questions);
    }
}
?>