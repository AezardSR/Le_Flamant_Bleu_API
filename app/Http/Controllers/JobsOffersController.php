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

    public function addJobsOffers($id, $name, $dateOffers, $description, $link, $id_users, $id_partnerContacts) {
        $jobsOffers = new JobsOffers();
        $jobsOffers->id = $id;
        $jobsOffers->name = $name;
        $jobsOffers->dateOffers = $dateOffers;
        $jobsOffers->description = $description;
        $jobsOffers->link = $link;
        $jobsOffers->id_users = $id_users;
        $jobsOffers->id_partnerContacts = $id_partnerContacts;
        $jobsOffers->save();
        return response()->json($jobsOffers);
    }

    public function deleteJobsOffers($id, $jobsOffers) {
        $jobsOffers = JobsOffers::find($id);
        $jobsOffers->delete();
        echo('Annonces de job bien supprimé');
    }


    public function changeJobsOffers($id, $name, $dateOffers, $description, $link, $id_users, $id_partnerContacts) {
        $jobsOffers = JobsOffers::find($id);
        $jobsOffers->id = $id;
        $jobsOffers->name = $name;
        $jobsOffers->dateOffers = $dateOffers;
        $jobsOffers->description = $description;
        $jobsOffers->link = $link;
        $jobsOffers->id_users = $id_users;
        $jobsOffers->id_partnerContacts = $id_partnerContacts;
        $jobsOffers->save();
        return response()->json($jobsOffers);
    }

}
