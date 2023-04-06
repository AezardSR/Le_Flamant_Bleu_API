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

/**
 * @OA\SecurityScheme(
 *   securityScheme="bearerAuth",
 *   type="http",
 *   scheme="bearer",
 *   bearerFormat="JWT",
 * )
 */

class AuthController extends Controller
{     

    public function __construct()
    {
        $this->middleware('auth:jwt.log', ['except' => ['login', 'register']]);
    }
    /* fontion de connexion */
/**
 * @OA\Post(
 *     path="/login",
 *     summary="Authentification de l'utilisateur",
 *     description="Authentification de l'utilisateur",
 *     operationId="authUser",
 *     tags={"Authentification"},
 *     @OA\RequestBody(
 *         description="Informations d'authentification",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="mail",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="password",
 *                     type="string"
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="Authentification réussie",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="access_token",
 *                 type="string"
 *             ),
 *             @OA\Property(
 *                 property="token_type",
 *                 type="string",
 *                 example="bearer"
 *             ),
 *             @OA\Property(
 *                 property="expires_in",
 *                 type="integer",
 *                 example="3600"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response="400",
 *         description="Information de connexion erronée",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="success",
 *                 type="boolean",
 *                 example=false
 *             ),
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 example="Information de connexion erronée"
 *             )
 *         )
 *     )
 * )
 */
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

/**
 * Register a new user
 *
 * @OA\Post(
 *     path="/register",
 *     tags={"Authentification"},
 *     summary="Register a new user",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(property="name",type="string",description="User's name",example="John"),
 *                 @OA\Property(property="firstname",type="string",description="User's firstname",example="Doe"),
 *                 @OA\Property(property="mail",type="string",description="User's email address",example="johndoe@example.com"),
 *                 @OA\Property(property="password",type="string",description="User's password",example="Password_123"),
 *                 @OA\Property(property="password_confirmation",type="string",description="User's password confirmation",example="Password_123"),
 *             ),
 *         ),
 *     ),
 *     @OA\Response(
 *         response="201",
 *         description="User successfully registered",
 *         @OA\JsonContent(
 *             @OA\Property(property="message",type="string",example="User successfully registered"),
 *             @OA\Property(property="user",type="object",
 *               @OA\Property(property="name",type="string", example="John"),
 *               @OA\Property(property="firstname",type="string", example="Doe"),
 *               @OA\Property(property="mail",type="string", example="johnDoe@example.com"),
 *               @OA\Property(property="roles_id",type="integer", example="1"),
 *               @OA\Property(property="types_id",type="integer", example="1"),
 *               @OA\Property(property="updated_at",type="date-time", example="2020-05-06T15:00:00.000000Z"),
 *               @OA\Property(property="created_at",type="date-time", example="2020-05-06T15:00:00.000000Z"),
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response="400",
 *         description="Validation error",
 *         @OA\JsonContent(
 *             @OA\Property(property="message",type="string",example="The given data was invalid"),
 *             @OA\Property(property="errors",type="object",description="Object containing all the validation errors",                 example={
 *                     "name": {
 *                         "The name field is required."
 *                     },
 *                     "mail": {
 *                         "The mail field is required.",
 *                         "The mail field must be a valid email address.",
 *                         "The mail has already been taken."
 *                     },
 *                     "password": {
 *                         "The password field is required."
 *                     }
 *                 }
 *             )
 *         )
 *     )
 * )
 */

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

    /**
 * Déconnecte l'utilisateur actuellement authentifié.
 *
 * @OA\Post(
 *     path="/logout",
 *     summary="Déconnecte l'utilisateur actuellement authentifié",
 *     tags={"Authentification"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Response(
 *         response=200,
 *         description="Message de réussite",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Utilisateur déconnecté avec succès")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Erreur d'authentification",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="string", example="Token is Invalid")
 *         )
 *     )
 * )
 */
    
    public function logout() {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
 * @OA\Get(
 *     path="/refresh",
 *     tags={"Authentification"},
 *     summary="Refresh the current JWT token.",
 *     operationId="refreshToken",
 *     security={{"bearerAuth":{}}},
 *     @OA\Response(response=200, description="Successful operation",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="connected"),
 *             @OA\Property(property="access_token", type="string"),
 *             @OA\Property(property="token_type", type="string"),
 *             @OA\Property(property="expires_in", type="integer", description="Expiration time in seconds")
 *         )
 *     ),
 *     @OA\Response(response=401,description="Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string"),
 *             @OA\Property(property="message", type="string")
 *         )
 *     )
 * )
 */
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

/**
 * @OA\Get(
 *     path="/user-profile",
 *     tags={"User"},
 *     summary="Obtenir le profil de l'utilisateur actuel.",
 *     operationId="obtenirProfilUtilisateur",
 *     security={{"bearerAuth":{}}},
 *     @OA\Response(
 *         response=200,
 *         description="Opération réussie",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string"),
 *             @OA\Property(
 *                 property="user",
 *                 type="object",
 *                 description="objet contenant les informations de l'utilisateur",  
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="name", type="string", example="Doe"),
 *                 @OA\Property(property="firstname", type="string", example="John"),
 *                 @OA\Property(property="birthdate", type="date", format="date-time", nullable=true, example="2020-04-06"),
 *                 @OA\Property(property="mail", type="string", example="jhondoe@example.com"), 
 *                 @OA\Property(property="tel", type="string", nullable=true, example=0606060606),
 *                 @OA\Property(property="address", type="string", nullable=true, example="rue de la paix"),
 *                 @OA\Property(property="city", type="string", nullable=true, example="Paris"),
 *                 @OA\Property(property="zipCode", type="string", nullable=true, example=75000),
 *                 @OA\Property(property="roles_id", type="integer", example=1),
 *                 @OA\Property(property="types_id", type="integer", example=1),
 *                 @OA\Property(property="created_at", type="date-time", format="date-time", example="2023-04-06T12:16:12.000000Z"),
 *                 @OA\Property(property="updated_at", type="date-time", format="date-time", example="2023-04-06T12:16:12.000000Z")
 *             ),
 *          ),    
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Non autorisé",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string"),
 *             @OA\Property(property="message", type="string")
 *         )
 *     )
 * )
 */
    public function userProfile() {
        $user = auth()->user()->load('role', 'type');
    
        return response()->json([
            'message' => 'success',
            'user' => $user
        ]);
    }
}


