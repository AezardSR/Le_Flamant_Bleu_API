<?php

namespace App\Http\Controllers;

use App\Models\Connexion;
use Illuminate\Http\Request;

class ConnexionController extends Controller
{
    public function getuserList()
    {
        $user = user::all();
        return response()->json($user);
    }
}

