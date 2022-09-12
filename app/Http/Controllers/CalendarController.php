<?php

namespace App\Http\Controllers;

use App\Models\AppointmentsTypes;
use App\Models\Appointments;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    //Get
    public function getAppointmentsTypes($AppointmentsTypes) {
        $AppointmentsTypes = AppointmentsTypes::all();
        return response()->json($AppointmentsTypes);
    }

    public function getAppointments($Appointments) {
        $Appointments = Appointments::all();
        return response()->json($Appointments);
    }

    //Add

    public function addAppointmentsTypes($id, $name) {
        $AppointmentsTypes = new AppointmentsTypes();
        $AppointmentsTypes->id = $id;
        $AppointmentsTypes->name = $name;
        $AppointmentsTypes->save();
        return response()->json($AppointmentsTypes);
    }

    public function addAppointments($id, $titleDetails, $descriptionDeatils, $dateDetails, $id_receiver, $id_create, $id_appointments_types) {
        $Appointments = new Appointments();
        $Appointments->id = $id;
        $Appointments->titleDetails = $titleDetails;
        $Appointments->descriptionDeatils = $descriptionDeatils;
        $Appointments->dateDetails = $dateDetails;
        $Appointments->id_receiver = $id_receiver;
        $Appointments->id_create = $id_create;
        $Appointments->id_appointments_types = $id_appointments_types;
        $Appointments->save();
        return response()->json($Appointments);
    }

    //Delete
    public function deleteAppointmentsTypes($id, $AppointmentsTypes) {
        $AppointmentsTypes = AppointmentsTypes::find($id);
        $AppointmentsTypes->delete();
        echo('Type de rdv bien supprimé');
    }

    public function deleteAppointments($id, $Appointments) {
        $Appointments = Appointments::find($id);
        $Appointments->delete();
        echo('Rdv bien supprimé');
    }

    //Change
    public function changeAppointmentsTypes($id, $name) {
        $AppointmentsTypes = AppointmentsTypes::find($id);
        $AppointmentsTypes->id = $id;
        $AppointmentsTypes->name = $name;
        $AppointmentsTypes->save();
        return response()->json($AppointmentsTypes);
    }

    public function changeAppointments($id, $titleDetails, $descriptionDeatils, $dateDetails, $id_receiver, $id_create, $id_appointments_types) {
        $Appointments = Appointments::find($id);
        $Appointments->id = $id;
        $Appointments->titleDetails = $titleDetails;
        $Appointments->descriptionDeatils = $descriptionDeatils;
        $Appointments->dateDetails = $dateDetails;
        $Appointments->id_receiver = $id_receiver;
        $Appointments->id_create = $id_create;
        $Appointments->id_appointments_types = $id_appointments_types;
        $Appointments->save();
        return response()->json($Appointments);
    }
}
