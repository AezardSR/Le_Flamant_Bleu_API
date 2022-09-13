<?php

namespace App\Http\Controllers;

use App\Models\Users;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //inscription
    public function InscrisUtilisateur(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $utilisateur = new User;
        
        $utilisateur->first_name = $request->first_name;
        $utilisateur->last_name = $request->last_name;
        $utilisateur->email =   $request->email;
        $utilisateur->password  = bcrypt($request->password);
    
        $utilisateur->save();

        return response()->json([
            'msg'=>'Utilisateur creation reussi',
            'status_code' => 200,
            'utilisateur'=> $utilisateur
            ]);  
    }

    

}


