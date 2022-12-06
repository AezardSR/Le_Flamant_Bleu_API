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
    public function editRegistrationType($id, Request $request){
        $registationTypes = DB::table('registrationTypes')->where('id','=',$id)->update([$request->input('column') => $request->input('newValue')]);
    }

    public function createRegistration(Request $request){
        $registration = new Registrations();
        $registration->dateRegistration = $request->input('dateRegistration');
        $registration->detailRegistration = $request->input('detailRegistration');

        $registration->promos_id = Promos::find(
            intval(
                $request->input('promos_id')
            )
        )->id;

        $registration->registrationTypes_id = RegistrationsTypes::find(
            intval(
                $request->input('registrationTypes_id')
            )
        )->id;

        $registration->save();
        return responce()->json($registration);
    }

    public function getRegistrationsList(){
        $registration = Registrations::all();
        return response()->json($registration);
    }

    public function getOneRegistration($id){
        $registration = DB::table('registrations')->select('dateRegistration','detailRegistration','promos_id','registrationTypes_id')->where('id','=', $id)->get();
        return response()->json($registration);
    }

    public function editRegistration($id, Request $request){
        $registration = DB::table('registrations')->where('id','=',$id)->update([$request->input('column') => $request->input('newValue')]);
    }

    public function getSignatureList($registrations_id){
        $signature = DB::table('signatures')->select('user_id','registrations_id','date')->where('registrations_id','=',$registrations_id)->get();
        return response()->json($signature);
    }
    
    public function addSignature(Request $request){
        $signature = new Signatures();

        $signature->user_id = user::find(
            intval(
                $request->input('user_id')
            )
        )->id;

        $signature->registrations_id = Registrations::find(
            intval(
                $request->input('registrations_id')
            )
        )->id;

        $signature->date = $request->input('date');
        $signature->save();
        return responce()->json($signature);
    }
}
