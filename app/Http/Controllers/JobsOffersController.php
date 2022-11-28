<?php

namespace App\Http\Controllers;

use App\Models\JobsOffers;
use Illuminate\Http\Request;

class JobsOffersController extends Controller
{
    public function getJobsOffers($jobsOffers) {
        $jobsOffers = JobsOffers::all();
        return response()->json($jobsOffers);
    }

    public function addJobsOffers(Request $request) {
        $jobsOffers = new JobsOffers();
        $jobsOffers->name = $request->input('name');
        $jobsOffers->dateOffers = $request->input('dateOffers');
        $jobsOffers->description = $request->input('description');
        $jobsOffers->link = $request->input('link');
        $jobsOffers->id_users = $request->input(JobsOffers::find('id_users'));
        $jobsOffers->id_partnerContacts = $request->input(JobsOffers::find('id_partnerContacts'));
        $jobsOffers->save();
        return response()->json($jobsOffers);
    }

    public function deleteJobsOffers($id, $jobsOffers) {
        $jobsOffers = JobsOffers::find($id);
        $jobsOffers->delete();
        echo('Annonces de job bien supprimé');
    }


    public function changeJobsOffers(Request $request) {
        $jobsOffers = JobsOffers::find($id);
        $jobsOffers->name = $request->input('name');
        $jobsOffers->dateOffers = $request->input('dateOffers');
        $jobsOffers->description = $request->input('description');
        $jobsOffers->link = $request->input('link');
        $jobsOffers->id_users = $request->input(JobsOffers::find('id_users'));
        $jobsOffers->id_partnerContacts = $request->input(JobsOffers::find('id_partnerContacts'));
        $jobsOffers->save();
        return response()->json($jobsOffers);
    }

}
