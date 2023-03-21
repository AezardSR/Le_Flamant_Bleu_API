<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PartnerContacts;
use Illuminate\Http\Request;

class PartnerContactController extends Controller
{
     /**
     * @OA\Get(
     *      path="/partnercontacts",
     *      operationId="getPartnerContact",
     *      tags={"Partner Contact"},

     *      summary="Liste des partenaires",
     *      description="Liste des partenaires",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
     */
    public function getPartnerContact() {
        $partnerContact = PartnerContacts::all();
        return response()->json($partnerContact);
    }
    /**
     * @OA\Post(
     *      path="/partnercontacts/add",
     *      operationId="addPartnerContact",
     *      tags={"Partner Contact"},

     *      summary="Ajouter un contact partenaire",
     *      description="Ajouter un contact partenaire",
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
     *                          property="mail",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="tel",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="nameCompany",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="user_id",
     *                          type="integer"
     *                      )
     *                 ),
     *                 example={
     *                     "name":"Benjamin",
     *                     "firstname":"Pmt",
     *                     "mail":"lamanu@gmail.fr",
     *                     "tel":"0344556677",
     *                     "nameCompany":"nom document",
     *                      "user_id":1
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
    public function addPartnerContact(Request $request) {
        $partnerContact = new PartnerContacts();
        $partnerContact->name = $request->input('name');
        $partnerContact->firstname = $request->input('firstname');
        $partnerContact->mail = $request->input('mail');
        $partnerContact->tel = $request->input('tel');
        $partnerContact->nameCompany = $request->input('nameCompany');

        $partnerContact->user_id = User::find(
            intval(
                $request->input('user_id')
            )
        )->id; 

        $partnerContact->save();
        return response()->json($partnerContact);
    }
    /**
     * @OA\Delete (
     *      path="/partnercontacts/delete/{id}",
     *      operationId="deletePartnerContact",
     *      tags={"Partner Contact"},
     *      summary="Supprimer un partenaire",
     *      description="Supprimer un partenaire en fonction de son ID",
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
    public function deletePartnerContact($id) {
        $partnerContact = PartnerContacts::find($id);
        $partnerContact->delete();
    }

    /**
     * @OA\Patch (
     *      path="/partnercontacts/update/{id}",
     *      operationId="changePartnerContact",
     *      tags={"Partner Contact"},
     *      summary="Modifier un partenaire",
     *      description="Modifier un partenaire",
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
     *                          property="mail",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="tel",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="nameCompany",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="user_id",
     *                          type="integer"
     *                      )
     *                 ),
     *                 example={
     *                     "name":"Benjamin",
     *                     "firstname":"Pmt",
     *                     "mail":"lamanu@gmail.fr",
     *                     "tel":"0344556677",
     *                     "nameCompany":"nom document",
     *                      "user_id":1
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
    public function changePartnerContact($id, Request $request) {
        $partnerContact = PartnerContacts::find($id);
        $partnerContact->name = $request->input('name');
        $partnerContact->firstname = $request->input('firstname');
        $partnerContact->mail = $request->input('mail');
        $partnerContact->tel = $request->input('tel');
        $partnerContact->nameCompany = $request->input('nameCompany');

        $partnerContact->user_id = User::find(
            intval(
                $request->input('user_id')
            )
        )->id; 

        $partnerContact->save();
        return response()->json($partnerContact);
    }
}
