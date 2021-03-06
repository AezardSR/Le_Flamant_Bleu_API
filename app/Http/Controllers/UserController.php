<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function addUser($name,$firstname,$birthdate,$mail,$tel,$password,$adress,$city,$zipCode,$id_roles,$id_types){

        $user = new Users();
        $user->name = $name;
        $user->firstname = $firstname;
        $user->birthdate = $birthdate;
        $user->mail = $mail;
        $user->tel = $tel;
        $user->password = Hash::make($password);
        $user->adress = $adress;
        $user->city = $city;
        $user->zipCode = $zipCode;
        $user->id_roles = $id_roles;
        $user->id_types = $id_types;
        $user->save();
        return response()->json($user);

    }
    public function getUsersList()
    {
        $users = Users::all();
        return response()->json($users);
    }

    public function getOneUser($id){
        $user = DB::table('users')->select('name','firstname','mail','tel','adress','city','zipCode')->where('id','=', $id)->get();
        return response()->json($user);
    }

    public function editUser($id,$column,$newValue){
        $user = DB::table('users')->where('id','=',$id)->update([$column => $newValue]);
    }

    
}
