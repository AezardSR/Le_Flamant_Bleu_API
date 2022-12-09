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
     *      operationId="Documents",
     *      tags={"documents"},

     *      summary="Tous les documents",
     *      description="Returns all countries and associated provinces. The country_slug variable is used for country specific data",
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

    //Delete
    public function deleteDocuments($id) {
        $documents = Documents::find($id);
        $documents->delete();
        echo('Document bien supprimé');
    }

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
