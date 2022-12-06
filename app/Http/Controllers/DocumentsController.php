<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\Documents;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    //Get
    public function getDocuments() {
        $documents = Documents::all();
        return response()->json($documents);
    }

    //Add
    public function addDocuments(Request $request) {
        $documents = new Documents();
        $documents->name = $request->input('name');

        $documents->user_id = user::find(
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

        $documents->user_id = user::find(
            intval(
                $request->input('user_id')
            )
        )->id;
        $documents->save();
        return response()->json($documents);
    }

}
