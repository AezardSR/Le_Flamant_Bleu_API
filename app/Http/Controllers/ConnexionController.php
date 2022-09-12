<?php

namespace App\Http\Controllers;

use App\Models\Connexion;
use Illuminate\Http\Request;

class ConnexionController extends Controller
{
    public function getUsersList()
    {
        $users = Users::all();
        return response()->json($users);
    }
}

