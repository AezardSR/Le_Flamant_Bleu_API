<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    //Get
    public function getDocuments($documents) {
        $documents = Documents::all();
        return response()->json($documents);
    }

    //Add
    public function addDocuments($id, $name, $id_users) {
        $documents = new Documents();
        $documents->id = $id;
        $documents->name = $name;
        $documents->id_users = $id_users;
        $documents->save();
        return response()->json($documents);
    }

    //Delete
    public function deleteDocuments($id, $documents) {
        $documents = Documents::find($id);
        $documents->delete();
        echo('Document bien supprimé');
    }

    //Change
    public function changeDocuments($id, $name, $id_users) {
        $documents = Documents::find($id);
        $documents->id = $id;
        $documents->name = $name;
        $documents->id_users = $id_users;
        $documents->save();
        return response()->json($documents);
    }

}
