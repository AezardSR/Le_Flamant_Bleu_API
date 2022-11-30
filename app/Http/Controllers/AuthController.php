<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Roles;
use App\Models\Types;
Use JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;

use Validator;

class AuthController extends Controller
{     

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    /* fontion de connexion */
    public function login (Request $request){

        $credentials = $request->only('mail', 'password');

    	$validator = Validator::make($credentials, [
            'mail' => 'required|email',
            'password' => ['required','string','min:6','regex:/^(?=.*[a-z|A-Z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //Request is validated
        //Crean token
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json([
                	'success' => false,
                	'message' => 'Login credentials are invalid.',
                ], 400);
            }
        } catch (JWTException $e) {
    	return $credentials;
            return response()->json([
                	'success' => false,
                	'message' => 'Could not create token.',
                ], 500);
        }
 	
 		//Token created, return with success response and jwt token
        return response()->json([
            'success' => true,
            'token' => $token,
        ]);

        /*if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('Laravel Password Grant Client')->accessToken;
            $response = ['token' => $token];
            return response($response, 200);
        } else {
            $response = ["message" =>'information de connexion eronné'];
            return response($response, 422);
        }

        $accessToken = Auth::User()->createToken('authToken')->$accessToken;

        return response(json(['User' => Auth::User(), 'access_token' => $accessToken]));*/
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
        'roles_id'=> Roles::find(1)->id,
        'types_id'=> Types::find(1)->id
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


