<?php

namespace App\Http\Controllers;

use App\Models\registrationTypes;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function getRegistrationList(){
        $registationTypes = RegistrationTypes::all();
        return response()->json($registationTypes);
    }
}
