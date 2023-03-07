<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Documents;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
     /**
     * @OA\Get(
     *      path="/documents",
     *      operationId="getDocuments",
     *      tags={"documents"},

     *      summary="Tous les documents",
     *      description="",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */

    //Get
    public function getDocuments() {
        $documents = Documents::all();
        return response()->json($documents);
    }

    /**
     * @OA\Post(
     *      path="/documents",
     *      operationId="addDocuments",
     *      tags={"documents"},

     *      summary="Ajouter un documents",
     *      description="Voici la fonction qui permet d'ajouter un document dans l'API. Nous pouvons voir les messages d'erreurs si cela ne marche pas",
     *      @OA\Response(
     *          response=200,
     *          description="Operation Reussie",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    //Add
    public function addDocuments(Request $request) {
        $documents = new Documents();
        $documents->name = $request->input('name');

        $documents->user_id = User::find(
            intval(
                $request->input('user_id')
            )
        )->id;

        $documents->save();
        return response()->json($documents);
    }


  /**
     * @OA\Delete (
     *      path="/documents/{id}",
     *      operationId="deleteDocuments",
     *      tags={"documents"},
     *      summary="Supprimer un Documents",
     *      description="Permets de supprimer un documents en fonction de son ID",
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
     *      @OA\Response (
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response (
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response (
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response (
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    //Delete
    public function deleteDocuments($id) {
        $documents = Documents::find($id);
        $documents->delete();
        echo('Document bien supprimé');
    }

    /**
     * @OA\Patch (
     *      path="/documents/{id}",
     *      operationId="changeDocuments",
     *      tags={"documents"},
     *      summary="modifier un Documents",
     *      description="Permets de modifier un documents en fonction de son ID",
     *     @OA\Parameter (
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema (
     *           type="integer",
     *           format="int64",
     *      ),
     * ),
     * @OA\Parameter (
     *      name="name",
     *      in="query",
     *      description="changement name",
     *      @OA\Schema (
     *           type="string"
     *      )
     *   ),
     * * @OA\Parameter (
     *      name="user_id",
     *      in="path",
     *      description="changement user_id",
     *      @OA\Schema (
     *           type="integer",
     *           format="int64",
     *      )
     *   ),
     *      @OA\Response (
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response (
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response (
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response (
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response (
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    //Change
    public function changeDocuments($id, Request $request) {
        $documents = Documents::find($id);
        $documents->id = $id;
        $documents->name = $request->input('name');

        $documents->user_id = User::find(
            intval(
                $request->input('user_id')
            )
        )->id;
        $documents->save();
        return response()->json($documents);
    }

}
