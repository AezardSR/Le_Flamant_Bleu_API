<?php

namespace App\Http\Controllers;

use App\Models\RegistrationTypes;
use App\Models\Registrations;
use App\Models\Promos;
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
        $registration = new Registration();
        $registration->dateRegistration = $dateRegistration;
        $registration->detailRegistration = $detailRegistration;
        $registration->id_promos = $id_promos;
        $registration->id_registrationTypes = $id_registrationTypes;
        $registration->save();
        return responce()->json($registration);
    }

    public function getRegistrationsList(){
        $registration = Registration::all();
        return response()->json($registration);
    }

    public function getOneRegistration($id){
        $registration = DB::table('registrations')->select('dateRegistration','detailRegistration','id_promos','id_registrationTypes')->where('id','=', $id)->get();
        return response()->json($registration);
    }

    public function editRegistration($id,$column,$newValue){
        $registration = DB::table('registrations')->where('id','=',$id)->update([$column => $newValue]);
    }


}
