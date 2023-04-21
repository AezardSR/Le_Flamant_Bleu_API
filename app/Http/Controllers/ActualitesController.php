<?php

namespace App\Http\Controllers;

use App\Models\Actualites;
use Illuminate\Http\Request;

class ActualitesController extends Controller
{
    //Get

    /**
     * @OA\Get(
     *      path="/actualites",
     *      operationId="getActualites",
     *      tags={"Actualites"},
     *      security={{"bearerAuth":{}}},
     *      summary="Toutes les actualités",
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
    public function getActualites() {
        $actualites = Actualites::all();
        return response()->json($actualites);
    }

    /**
     * @OA\Get(
     *      path="/actualites/{id}",
     *      operationId="getOneActualites",
     *      tags={"Actualites"},
     *      security={{"bearerAuth":{}}},
     *      summary="Une actualité",
     *      description="",
     *       @OA\Parameter (
     *           name="id",
     *           in="path",
     *           required=true,
     *           @OA\Schema (
     *               type="integer"
     *           )
     *       ),
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
    public function getOneActualites($id) {
        $actualites = Actualites::find($id);
        return response()->json($actualites);
    }

    //Add
    /**
     * @OA\Post(
     *      path="/actualites",
     *      operationId="addActualites",
     *      tags={"Actualites"},
     *      security={{"bearerAuth":{}}},
     *      summary="Ajouter une actualité",
     *      description="Permet l'ajout d'une actualité",
     *      @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="title",
     *                          type="string"
     *                      ),
*                           @OA\Property(
     *                          property="content",
     *                          type="longText"
     *                      ),
*                           @OA\Property(
     *                          property="publication_date",
     *                          type="date"
     *                      ),
*                           @OA\Property(
     *                          property="author",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "title":"New actu",
     *                     "content": "Bienvenu dans cette nouvelle actualité",
     *                     "publication_date": "2023-04-04",
     *                     "author": "John Joh"
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
    public function addActualites(Request $request) {
        $actualites = new Actualites();
        $actualites->title = $request->input('title');
        $actualites->content = $request->input('content');
        $actualites->publication_date = $request->input('publication_date');
        $actualites->author = $request->input('author');

        $actualites->save();
        return response()->json($actualites);
    }

    //Delete

    /**
     * @OA\Delete (
     *      path="/actualites/{id}",
     *      operationId="deleteActualites",
     *      tags={"Actualites"},
     *      security={{"bearerAuth":{}}},
     *      summary="Supprimer une actualité",
     *      description="Permets de supprimer une actualité en fonction de son ID",
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
    public function deleteActualites($id) {
        $actualites = Actualites::find($id);
        $actualites->delete();
    }

    /**
     * @OA\Patch (
     *      path="/actualites/{id}",
     *      operationId="changeActualites",
     *      tags={"Actualites"},
     *      security={{"bearerAuth":{}}},
     *      summary="modifier une actualité",
     *      description="Permets de modifier une actualité en fonction de son ID",
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
     *                          property="title",
     *                          type="string"
     *                      ),
*                           @OA\Property(
     *                          property="content",
     *                          type="longText"
     *                      ),
*                           @OA\Property(
     *                          property="publication_date",
     *                          type="date"
     *                      ),
*                           @OA\Property(
     *                          property="author",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "title":"Update actu",
     *                     "content": "Bienvenu dans cette nouvelle actualité à modifier",
     *                     "publication_date": "2023-04-04",
     *                     "author": "John Joh"
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
    //Change
    public function changeActualites($id, Request $request) {
        $actualites = Actualites::find($id);
        $actualites->id = $id;
        $actualites->title = $request->input('title');
        $actualites->content = $request->input('content');
        $actualites->publication_date = $request->input('publication_date');
        $actualites->author = $request->input('author');
        
        $actualites->save();
        return response()->json($actualites);
    }

}
