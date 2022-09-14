<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','registerUser']]);
    }

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

    public function loginTest(Request $request)
    {
        $utilisateur->name = $request->input('mail');
        $utilisateur->firstname = Hash::make($request->input('password'));

        $credentials = $request->only('email', 'password');

        $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::user();
        return response()->json([
                'status' => 'success',
                'user' => $user,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);

    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

}


