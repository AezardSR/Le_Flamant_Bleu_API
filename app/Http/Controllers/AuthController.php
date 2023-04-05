<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $this->middleware('auth:jwt.log', ['except' => ['login', 'register']]);
    }
    /* fontion de connexion */
    public function login (Request $request){

        $credentials = $request->only('mail', 'password');
        $token = null;

    	$validator = Validator::make($credentials, [
            'mail' => 'required|email',
            'password' => ['required','string','min:6','regex:/^(?=.*[a-z|A-Z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = user::where('mail', $request->mail)->first();

        if ($user && Hash::check($request->password, $user->password)) {
                if (! $token = JWTAuth::attempt($credentials)) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Information de connexion erronée',
                    ], 400);
                } else {
                    return $this->respondWithToken($token);
                }

            } else {
            $response = ["message" =>'Information de connexion erronée'];
            return response()->json($response, 422);
        }
    }
    
    /* fonction d'inscription  */

    public function register(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'firstname' => 'required|string|between:2,100',
            'mail' => 'required|string|max:100|unique:users',
            'password' => ['required','string','confirmed','min:6','regex:/^(?=.*[a-z|A-Z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'],
        ]);
        
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

       $user = user::create(array_merge($validator->validated(),
        [
        'password' => bcrypt($request->password),
        'roles_id'=> Roles::find(1)->id,
        'types_id'=> Types::find(1)->id
        ]));

        return response()->json(['message' => 'user successfully registered','user' => $user ], 201);

    }
    
    public function logout() {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }

    public function refresh() {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token) {
        return response()->json([
            'message' => 'connected',
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function userProfile() {
        return response()->json([
            'message' => 'succes',
            'user' => auth()->user()]);
    }


}


