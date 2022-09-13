<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //inscription
    public function registerUser(Request $request){

    $utilisateur = new Users();
    $utilisateur->name = $request->input('name');
    $utilisateur->firstname = $request->input('firstname');
    $utilisateur->mail =  $request->input('mail');
    $utilisateur->password  = Hash::make($request->input('password'));
    $utilisateur->id_roles =  1;
    $utilisateur->id_types =  1;

    $utilisateur->save();

    return response()->json([
        'msg'=>'Utilisateur creation reussi',
        'status_code' => 200,
        'utilisateur'=> $utilisateur
        ]);  
}

}


