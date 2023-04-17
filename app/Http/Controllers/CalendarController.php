<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AppointmentsTypes;
use App\Models\Appointments;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * @OA\Get(
     *      path="/appointment-types",
     *      operationId="getAppointmentsTypes",
     *      tags={"Appointments Types"},

     *      summary="Tous les types de rendez-vous",
     *      description="",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
    */
    public function getAppointmentsTypes() {
        $AppointmentsTypes = AppointmentsTypes::all();
        return response()->json($AppointmentsTypes);
    }

    /**
     * @OA\Get(
     *      path="/appointments",
     *      operationId="getAppointments",
     *      tags={"Appointments"},

     *      summary="Tous les rendez-vous",
     *      description="",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
    */
    public function getAppointments() {
        $Appointments = Appointments::all();
        return response()->json($Appointments);
    }

    //Add

    /**
     * @OA\Post(
     *      path="/appointment-types",
     *      operationId="addAppointmentsTypes",
     *      tags={"Appointments Types"},
     *      summary="Ajouter un type de rendez-vous",
     *      description="Ajouter un type de rendez-vous en lui indiquant un nom, l'id s'ajoutera automatiquement",
     *      @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="name",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "name":"ajouter un nom au type de rendez-vous"
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
    public function addAppointmentsTypes(Request $request) {
        $AppointmentsTypes = new AppointmentsTypes();
        $AppointmentsTypes->name = $request->input('name');
        $AppointmentsTypes->save();
        return response()->json($AppointmentsTypes);
    }

    /**
     * @OA\Post(
     *      path="/appointments",
     *      operationId="addAppointments",
     *      tags={"Appointments"},
     *      summary="Ajouter un rendez-vous",
     *      description="Ajouter un rendez-vous",
     *      @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="titleDetails",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="descriptionDetails",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="dateDetails",
     *                          type="date"
     *                      ),
     *                      @OA\Property(
     *                          property="receiver_id",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="create_id",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="appointments_types_id",
     *                          type="integer"
     *                      ),
     *                 ),
     *                 example={
     *                     "name":"ajouter un rendez-vous"
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
    public function addAppointments(Request $request) {
        $Appointments = new Appointments();
        $Appointments->titleDetails = $request->input('titleDetails');
        $Appointments->descriptionDetails = $request->input('descriptionDetails');
        $Appointments->dateDetails = $request->input('dateDetails');

        $Appointments->receiver_id = User::find(
            intval(
                $request->input('receiver_id')
            )
        )->id;

        $Appointments->create_id = User::find(
            intval(
                $request->input('create_id')
            )
        )->id;

        $Appointments->appointments_types_id = AppointmentsTypes::find(
            intval(
                $request->input('appointments_types_id')
            )
        )->id;

        $Appointments->save();
        return response()->json($Appointments);
    }

    //Delete

    /**
     * @OA\Delete (
     *      path="/appointment-types/{id}",
     *      operationId="deleteAppointmentsTypes",
     *      tags={"Appointments Types"},
     *      summary="Supprimer un type de rendez-vous",
     *      description="Supprimer un type de rendez-vous avec son ID",
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
    public function deleteAppointmentsTypes($id) {
        $AppointmentsTypes = AppointmentsTypes::find($id);
        $AppointmentsTypes->delete();
    }

    /**
     * @OA\Delete (
     *      path="/appointments/{id}",
     *      operationId="deleteAppointments",
     *      tags={"Appointments"},
     *      summary="Supprimer un rendez-vous",
     *      description="Supprimer un rendez-vous avec son ID",
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
    public function deleteAppointments($id) {
        $Appointments = Appointments::find($id);
        $Appointments->delete();
    }

    //Change
    /**
     * @OA\Patch (
     *      path="/appointment-types/{id}",
     *      operationId="changeAppointmentsTypes",
     *      tags={"Appointments Types"},
     *      summary="modifier un type de rendez-vous",
     *      description="Permets de modifier un type de rendez-vous",
     *     @OA\Parameter (
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema (
     *           type="integer",
     *      ),
     *    ),
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
     *                 ),
     *                 example={
     *                     "name":"Type de rendez-vous",
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
    public function changeAppointmentsTypes($id, Request $request) {
        $AppointmentsTypes = AppointmentsTypes::find($id);
        $AppointmentsTypes->name = $request->input('name');
        $AppointmentsTypes->save();
        return response()->json($AppointmentsTypes);
    }

    /**
     * @OA\Patch (
     *      path="/appointments/{id}",
     *      operationId="changeAppointments",
     *      tags={"Appointments"},
     *      summary="modifier un rendez-vous",
     *      description="Permets de modifier un rendez-vous",
     *     @OA\Parameter (
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema (
     *           type="integer",
     *      ),
     *    ),
     *      *      @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="titleDetails",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="descriptionDetails",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="dateDetails",
     *                          type="date"
     *                      ),
     *                      @OA\Property(
     *                          property="receiver_id",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="create_id",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="appointments_types_id",
     *                          type="integer"
     *                      ),
     *                 ),
     *                 example={
     *                     "titleDetails":"Nom du rendez-vous",
     *                     "descriptionDetails": "Détails du rendez-vous",
     *                     "dateDetails":1,
     *                     "receiver_id":1,
     *                     "create_id":2,
     *                     "appointments_types_id":1,
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
    public function changeAppointments($id, Request $request) {
        $Appointments = Appointments::find($id);
        $Appointments->titleDetails = $request->input('titleDetails');
        $Appointments->descriptionDetails = $request->input('descriptionDetails');
        $Appointments->dateDetails = $request->input('dateDetails');

        $Appointments->receiver_id = User::find(
            intval(
                $request->input('receiver_id')
            )
        )->id;

        $Appointments->create_id = User::find(
            intval(
                $request->input('create_id')
            )
        )->id;

        $Appointments->appointments_types_id = AppointmentsTypes::find(
            intval(
                $request->input('appointments_types_id')
            )
        )->id;
        
        $Appointments->save();
        return response()->json($Appointments);
    }
}
