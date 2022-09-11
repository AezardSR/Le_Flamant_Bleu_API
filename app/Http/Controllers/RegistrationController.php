<?php

namespace App\Http\Controllers;

use App\Models\RegistrationTypes;
use App\Models\Registrations;
use App\Models\Signatures;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    public function getRegistrationTypeList(){
        $registationTypes = RegistrationTypes::all();
        return response()->json($registationTypes);
    }
    public function editRegistrationType($id,$column,$newValue){
        $registationTypes = DB::table('registrationTypes')->where('id','=',$id)->update([$column => $newValue]);
    }

    public function createRegistration($dateRegistration,$detailRegistration,$id_promos,$id_registrationTypes){
        $registration = new Registrations();
        $registration->dateRegistration = $dateRegistration;
        $registration->detailRegistration = $detailRegistration;
        $registration->id_promos = $id_promos;
        $registration->id_registrationTypes = $id_registrationTypes;
        $registration->save();
        return responce()->json($registration);
    }

    public function getRegistrationsList(){
        $registration = Registrations::all();
        return response()->json($registration);
    }

    public function getOneRegistration($id){
        $registration = DB::table('registrations')->select('dateRegistration','detailRegistration','id_promos','id_registrationTypes')->where('id','=', $id)->get();
        return response()->json($registration);
    }

    public function editRegistration($id,$column,$newValue){
        $registration = DB::table('registrations')->where('id','=',$id)->update([$column => $newValue]);
    }

    public function getSignatureList($id_registrations){
        $signature = DB::table('signatures')->select('id_users','id_registrations','date')->where('id_registrations','=',$id_registrations)->get();
        return response()->json($signature);
    }
    
    public function addSignature($id_users,$id_registrations,$date){
        $signature = new Signatures();
        $signature->id_users = $id_users;
        $signature->id_registrations = $id_registrations;
        $signature->date = $date;
        $signature->save();
        return responce()->json($signature);
    }
}
