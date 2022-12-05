<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\PartnerContacts;
use Illuminate\Http\Request;

class PartnerContactController extends Controller
{
    public function getPartnerContact() {
        $partnerContact = PartnerContacts::all();
        return response()->json($partnerContact);
    }

    public function addPartnerContact(Request $request) {
        $partnerContact = new PartnerContacts();
        $partnerContact->name = $request->input('name');
        $partnerContact->firstname = $request->input('firstname');
        $partnerContact->mail = $request->input('mail');
        $partnerContact->tel = $request->input('tel');
        $partnerContact->nameCompany = $request->input('nameCompany');

        $partnerContact->id_user = user::find(
            intval(
                $request->input('id_user')
            )
        )->id; 

        $partnerContact->save();
        return response()->json($partnerContact);
    }

    public function deletePartnerContact($id, $partnerContact) {
        $partnerContact = PartnerContacts::find($id);
        $partnerContact->delete();
        echo('Partenaire bien supprimé');
    }


    public function changePartnerContact($id, Request $request) {
        $partnerContact = PartnerContacts::find($id);
        $partnerContact->name = $request->input('name');
        $partnerContact->firstname = $request->input('firstname');
        $partnerContact->mail = $request->input('mail');
        $partnerContact->tel = $request->input('tel');
        $partnerContact->nameCompany = $request->input('nameCompany');

        $partnerContact->id_user = user::find(
            intval(
                $request->input('id_user')
            )
        )->id; 

        $partnerContact->save();
        return response()->json($partnerContact);
    }
}
