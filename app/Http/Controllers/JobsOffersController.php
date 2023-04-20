<?php

namespace App\Http\Controllers;

use App\Models\JobsOffers;
use App\Models\User;
use App\Models\PartnerContacts;
use Illuminate\Http\Request;

class JobsOffersController extends Controller
{
    /**
     * @OA\Get(
     *      path="/job-offers",
     *      operationId="getJobsOffers",
     *      tags={"Job Offer"},
     *      security={{"bearerAuth":{}}},
     *      summary="Voir toutes les offres d'emplois",
     *      description="Voir toutes les offres d'emplois",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
     */
    public function getJobsOffers() {
        $jobsOffers = JobsOffers::all();
        return response()->json($jobsOffers);
    }

    /**
     * @OA\Post(
     *      path="/job-offers/add",
     *      operationId="addJobsOffers",
     *      tags={"Job Offer"},
     *      security={{"bearerAuth":{}}},
     *      summary="Ajouter une offre d'emploi",
     *      description="Ajouter une offre d'emploi",
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
     *                          property="dateOffers",
     *                          type="string",
     *                          format="date",
     *                          pattern="/([0-9]{4})-(?:[0-9]{2})-([0-9]{2})/"
     *                      ),
     *                      @OA\Property(
     *                          property="description",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="link",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="user_id",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="partnerContacts_id",
     *                          type="integer"
     *                      )
     *                 ),
     *                 example={
     *                     "name":"Ricard",
     *                     "dateOffers":"2012-09-04",
     *                     "description":"mettre une description",
     *                     "link":"chemin",
     *                     "user_id":1,
     *                     "partnerContacts_id":1
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
    public function addJobsOffers(Request $request) {
        $jobsOffers = new JobsOffers();
        $jobsOffers->name = $request->input('name');
        $jobsOffers->dateOffers = $request->input('dateOffers');
        $jobsOffers->description = $request->input('description');
        $jobsOffers->link = $request->input('link');

        $jobsOffers->user_id = User::find(
            intval(
                $request->input('user_id')
            )
        )->id;

        $jobsOffers->partnerContacts_id = PartnerContacts::find(
            intval(
                $request->input('partnerContacts_id')
            )
        )->id;

        $jobsOffers->save();
        return response()->json($jobsOffers);
    }
  /**
     * @OA\Delete (
     *      path="/job-offers/delete/{id}",
     *      operationId="deleteJobsOffers",
     *      tags={"Job Offer"},
     *      security={{"bearerAuth":{}}},
     *      summary="Supprimer une offre d'emploi avec son ID",
     *      description="Supprimer une offre d'emploi avec son ID",
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
    public function deleteJobsOffers($id) {
        $jobsOffers = JobsOffers::find($id);
        $jobsOffers->delete();
    }

    /**
     * @OA\Patch (
     *      path="/job-offers/update/{id}",
     *      operationId="changeJobsOffers",
     *      tags={"Job Offer"},
     *      security={{"bearerAuth":{}}},
     *      summary="modifier une offre d'emploi",
     *      description="Permets de modifier une offre d'emploi",
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
     *                          property="dateOffers",
     *                          type="string",
     *                          format="date",
     *                          pattern="/([0-9]{4})-(?:[0-9]{2})-([0-9]{2})/"
     *                      ),
     *                      @OA\Property(
     *                          property="description",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="link",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="user_id",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="partnerContacts_id",
     *                          type="integer"
     *                      )
     *                 ),
     *                 example={
     *                     "name":"nom",
     *                      "dateOffers":"2012-09-04",
     *                      "description":"mettre du texte",
     *                      "link":"mettre du texte",
     *                      "user_id":1,
     *                      "partnerContacts_id":2
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
    public function changeJobsOffers($id, Request $request) {
        $jobsOffers = JobsOffers::find($id);
        $jobsOffers->name = $request->input('name');
        $jobsOffers->dateOffers = $request->input('dateOffers');
        $jobsOffers->description = $request->input('description');
        $jobsOffers->link = $request->input('link');

        $jobsOffers->user_id = User::find(
            intval(
                $request->input('user_id')
            )
        )->id;

        $jobsOffers->partnerContacts_id = PartnerContacts::find(
            intval(
                $request->input('partnerContacts_id')
            )
        )->id;

        $jobsOffers->save();
        return response()->json($jobsOffers);
    }

}
