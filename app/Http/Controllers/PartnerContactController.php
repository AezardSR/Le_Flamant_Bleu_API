<?php

namespace App\Http\Controllers;

use App\Models\PartnerContacts;
use Illuminate\Http\Request;

class PartnerContactController extends Controller
{
    public function getPartnerContact($partnerContact) {
        $partnerContact = PartnerContacts::all();
        return response()->json($partnerContact);
    }

    public function addPartnerContact($id, $name, $firstname, $mail, $tel, $nameCompany, $id_users) {
        $partnerContact = new PartnerContacts();
        $partnerContact->id = $id;
        $partnerContact->name = $name;
        $partnerContact->firstname = $firstname;
        $partnerContact->mail = $mail;
        $partnerContact->tel = $tel;
        $partnerContact->nameCompany = $nameCompany;
        $partnerContact->id_users = $id_users;
        $partnerContact->save();
        return response()->json($partnerContact);
    }

    public function deletePartnerContact($id, $partnerContact) {
        $partnerContact = PartnerContacts::find($id);
        $partnerContact->delete();
        echo('Partenaire bien supprimé');
    }


    public function changePartnerContact($id, $name, $firstname, $mail, $tel, $nameCompany, $id_users) {
        $partnerContact = PartnerContacts::find($id);
        $partnerContact->id = $id;
        $partnerContact->name = $name;
        $partnerContact->firstname = $firstname;
        $partnerContact->mail = $mail;
        $partnerContact->tel = $tel;
        $partnerContact->nameCompany = $nameCompany;
        $partnerContact->id_users = $id_users;
        $partnerContact->save();
        return response()->json($partnerContact);
    }
}
