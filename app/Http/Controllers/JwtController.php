<?php

namespace App\Http\Controllers;

use App\Models\Jwt;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class JwtController extends Controller
{
    protected $users;
 
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

}

