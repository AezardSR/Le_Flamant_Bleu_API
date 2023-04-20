<?php

namespace App\Http\Controllers;

use App\Models\Actualites;
use Illuminate\Http\Request;

class ActualitesController extends Controller
{
    //Get
    public function getActualites() {
        $actualites = Actualites::all();
        return response()->json($actualites);
    }

    public function getOneActualites($id) {
        $actualites = Actualites::find($id);
        return response()->json($actualites);
    }

    //Add
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
    public function deleteActualites($id) {
        $actualites = Actualites::find($id);
        $actualites->delete();
    }

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
