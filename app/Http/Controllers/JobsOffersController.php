<?php

namespace App\Http\Controllers;

use App\Models\JobsOffers;
use App\Models\User;
use App\Models\PartnerContacts;
use Illuminate\Http\Request;

class JobsOffersController extends Controller
{
    public function getJobsOffers() {
        $jobsOffers = JobsOffers::all();
        return response()->json($jobsOffers);
    }

    public function getOneJobsOffers($id) {
        $jobsOffers = JobsOffers::find($id);
        return response()->json($jobsOffers);
    }

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

    public function deleteJobsOffers($id) {
        $jobsOffers = JobsOffers::find($id);
        $jobsOffers->delete();
    }


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
