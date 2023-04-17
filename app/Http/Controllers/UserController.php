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

    /**
     * @OA\Post(
     *      path="/user",
     *      operationId="addUser",
     *      tags={"User"},

     *      summary="Ajouter un utilisateur",
     *      description="Ajouter un utilisateur",
     *      @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="name",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="firstname",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="birthdate",
     *                          type="date"
     *                      ),
     *                      @OA\Property(
     *                          property="mail",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="tel",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="password",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="adress",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="city",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="zipCode",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="id_roles",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="id_types",
     *                          type="integer"
     *                      )
     *                 ),
     *                 example={
     *                     "name":"Nom de module",
     *                     "firstname":"Nom de module",
     *                     "birthdate":"Nom de module",
     *                     "mail":"Nom de module",
     *                     "tel":"Nom de module",
     *                     "password":"Nom de module",
     *                     "adress":"Nom de module",
     *                     "city":"Nom de module",
     *                     "zipCode":"Nom de module",
     *                     "id_roles":"Nom de module",
     *                     "id_types":"Nom de module"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
    */
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

    /**
     * @OA\Get(
     *      path="/user",
     *      operationId="getuserList",
     *      tags={"User"},

     *      summary="Voir tous les users",
     *      description="Voir tous les users",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
    */
    public function getuserList()
    {
        $user = user::all();
        return response()->json($user);
    }

    /**
     * @OA\Get (
     *      path="/user/{id}",
     *      operationId="getOneUser",
     *      tags={"User"},
     *      summary="Voir un user fonction de son ID",
     *      description="Voir un user en fonction de son ID",
     *     @OA\Parameter (
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema (
     *           type="integer"
     *      )
     *   ),
     *      @OA\Response (
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
    */
    public function getOneUser($id){
        $user = DB::table('users')->select('name','firstname','birthdate','mail','tel','address','city','zipCode','roles_id','types_id')->where('id','=', $id)->get();
        return response()->json($user);
    }

    /**
     * @OA\Patch (
     *      path="/user/{id}",
     *      operationId="editUser",
     *      tags={"User"},
     *      summary="modifier un user",
     *      description="modifier un user",
     *     @OA\Parameter (
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema (
     *           type="integer",
     *      ),
     * ),
     *      *      @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="name",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="firstname",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="birthdate",
     *                          type="date"
     *                      ),
     *                      @OA\Property(
     *                          property="mail",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="tel",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="password",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="adress",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="city",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="zipCode",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="id_roles",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="id_types",
     *                          type="integer"
     *                      )
     *                 ),
     *                 example={
     *                     "name":"Nom de module",
     *                     "firstname":"Nom de module",
     *                     "birthdate":"Nom de module",
     *                     "mail":"Nom de module",
     *                     "tel":"Nom de module",
     *                     "password":"Nom de module",
     *                     "adress":"Nom de module",
     *                     "city":"Nom de module",
     *                     "zipCode":"Nom de module",
     *                     "id_roles":"Nom de module",
     *                     "id_types":"Nom de module"
     *                }
     *             )
     *         )
     * ),
     *      @OA\Response (
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
    */
    public function editUser($id, Request $request){
        $user = DB::table('user')->where('id','=',$id)->update([$request->input('column') => $request->input('newValue')]);
    }

    /**
     * @OA\Delete (
     *      path="/user/{id}",
     *      operationId="deleteUser",
     *      tags={"User"},
     *      summary="Supprimer une reponse",
     *      description="Supprimer une reponse avec son ID",
     *     @OA\Parameter (
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema (
     *           type="integer"
     *      )
     *   ),
     *      @OA\Response (
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
    */
    public function deleteUser($id){
        $user = DB::table('users')->where('id','=',$id)->delete();
        // $user = User::find($id);
        // $user->delete();
        // echo('User supprimé');
    }

//emergency-contactss
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

     /**
     * @OA\Get(
     *      path="/EmergencyContact",
     *      operationId="getEmergencyContactsList",
     *      tags={"User"},

     *      summary="Voir les contacts d'urgences",
     *      description="Voir les contacts d'urgences",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
     */
public function getEmergencyContactsList(){
    $EmergencyContacts = EmergencyContacts::all();
    return response()->json($EmergencyContacts);
}

  /**
     * @OA\Get (
     *      path="/EmergencyContact/{id}",
     *      operationId="getOneEmergencyContact",
     *      tags={"User"},
     *      summary="Voir les contacts d'urgences en fonction de son ID",
     *      description="Voir les contacts d'urgences en fonction de son ID",
     *     @OA\Parameter (
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema (
     *           type="integer"
     *      )
     *   ),
     *      @OA\Response (
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
     */
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
