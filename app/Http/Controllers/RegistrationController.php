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

        $registration->id_promos = Promos::find(
            intval(
                $request->input('id_promos')
            )
        )->id;

        $registration->id_registrationTypes = RegistrationsTypes::find(
            intval(
                $request->input('id_registrationTypes')
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
        $registration = DB::table('registrations')->select('dateRegistration','detailRegistration','id_promos','id_registrationTypes')->where('id','=', $id)->get();
        return response()->json($registration);
    }

    public function editRegistration($id, Request $request){
        $registration = DB::table('registrations')->where('id','=',$id)->update([$request->input('column') => $request->input('newValue')]);
    }

    public function getSignatureList($id_registrations){
        $signature = DB::table('signatures')->select('id_user','id_registrations','date')->where('id_registrations','=',$id_registrations)->get();
        return response()->json($signature);
    }
    
    public function addSignature(Request $request){
        $signature = new Signatures();

        $signature->id_user = user::find(
            intval(
                $request->input('id_user')
            )
        )->id;

        $signature->id_registrations = Registrations::find(
            intval(
                $request->input('id_registrations')
            )
        )->id;

        $signature->date = $request->input('date');
        $signature->save();
        return responce()->json($signature);
    }
}
