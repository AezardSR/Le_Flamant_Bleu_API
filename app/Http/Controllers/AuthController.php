<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\ValidationException;

use Validator;

class AuthController extends Controller
{
     public function __construct() {
         $this->middleware('auth:api', ['except' => ['login', 'register']]);
     }
     
    /* fontion de connexion */
    public function login (Request $request){
    	$validator = Validator::make($request->all(), [
            'mail' => 'required|email',
            'password' => ['required','string','min:6','regex:/^(?=.*[a-z|A-Z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = Users::where('mail', $request->mail)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('Laravel Password Grant Client')->accessToken;
            $response = ['token' => $token];
            return response($response, 200);
        } else {
            $response = ["message" =>'information de connexion eronné'];
            return response($response, 422);
        }

        $accessToken = Auth::User()->createToken('authToken')->$accessToken;

        return response(json(['User' => Auth::User(), 'access_token' => $accessToken]));
    }

    /* fonction d'inscription  */

    public function register(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'firstname' => 'required|string|between:2,100',
            'mail' => 'required|string|max:100|unique:users',
            'password' => ['required','string','confirmed','min:6','regex:/^(?=.*[a-z|A-Z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'],
            'password_confirmed' => 'same:password'
        ]);
        

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = Users::create(array_merge($validator->validated(),
        [
        'password' => bcrypt($request->password),
        'id_roles'=> '1',
        'id_types'=> '1'
        ]));

        return response()->json(['message' => 'Users successfully registered','user' => $user ], 201);

    }
    
    public function logout() {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }

    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }

    public function userProfile() {
        return response()->json(auth()->user());
    }


}


