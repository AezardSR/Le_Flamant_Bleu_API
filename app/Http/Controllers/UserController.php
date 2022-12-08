<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use App\Models\Types;
use App\Models\EmergencyContacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function addUser(Request $request){

        $user = new User();

        $user->name = $request->input('name');
        $user->firstname = $request->input('firstname');
        $user->birthdate = $request->input('birthdate');
        $user->mail = $request->input('mail');
        $user->tel = $request->input('tel');
        $user->password = $request->input('password'); //To do => Chiffrer le mdp avec bcrypt
        $user->adress = $request->input('adress');
        $user->city = $request->input('city');
        $user->zipCode = $request->input('zipCode');

        $user->id_roles = Roles::find(
            intval(
                $request->input('id_roles')
            )
        )->id;

        $user->id_types = Types::find(
            intval(
                $request->input('id_types')
            )
        )->id;
  
        $user->save();
        return response()->json($user);

    }
    public function getuserList()
    {
        $user = user::all();
        return response()->json($user);
    }

    public function getOneUser($id){
        $user = DB::table('user')->select('name','firstname','mail','tel','address','city','zipCode')->where('id','=', $id)->get();
        return response()->json($user);
    }

    public function editUser($id, Request $request){
        $user = DB::table('user')->where('id','=',$id)->update([$request->input('column') => $request->input('newValue')]);
    }
    public function deleteUser($id){
        $EmergencyContacts = DB::table('user')->where('id','=',$id)->delete();
    }

//EmergencyContacts
public function addEmergencyContacts(Request $request){
    $EmergencyContacts = new EmergencyContacts();
    $EmergencyContacts->name = $request->input('name');
    $EmergencyContacts->firstname = $request->input('firstname');
    $EmergencyContacts->tel = $request->input('tel');

    $EmergencyContacts->user_id = user::find(
        intval(
            $request->input('user_id')
        )
    )->id;

    $EmergencyContacts->save();
    return response()->json($EmergencyContacts);
}

public function getEmergencyContactsList(){
    $EmergencyContacts = EmergencyContacts::all();
    return response()->json($EmergencyContacts);
}

public function getOneEmergencyContact($id){
    $EmergencyContacts = DB::table('emergency_contacts')->select('name','firstname','tel')->where('id','=', $id)->get();
    return response()->json($EmergencyContacts);
}

public function editEmergencyContact($id, Request $request){
    $EmergencyContacts = DB::table('emergency_contacts')->where('id','=',$id)->update([$request->input('column') => $request->input('newValue')]);
}

public function deleteEmergencyContact($id){
    $EmergencyContacts = DB::table('emergency_contacts')->where('id','=',$id)->delete();
}
    
}
