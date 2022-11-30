<?php

namespace App\Http\Controllers;

use App\Models\AppointmentsTypes;
use App\Models\Appointments;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    //Get
    public function getAppointmentsTypes() {
        $AppointmentsTypes = AppointmentsTypes::all();
        return response()->json($AppointmentsTypes);
    }

    public function getAppointments() {
        $Appointments = Appointments::all();
        return response()->json($Appointments);
    }

    //Add

    public function addAppointmentsTypes(Request $request) {
        $AppointmentsTypes = new AppointmentsTypes();
        $AppointmentsTypes->name = $request->input('name');
        $AppointmentsTypes->save();
        return response()->json($AppointmentsTypes);
    }

    public function addAppointments(Request $request) {
        $Appointments = new Appointments();
        $Appointments->titleDetails = $request->input('titleDetails');
        $Appointments->descriptionDeatils = $request->input('descriptionDeatils');
        $Appointments->dateDetails = $request->input('dateDetails');

        $Appointments->id_receiver = $request->input(Appointments::find('id_receiver'));
        $Appointments->id_create = $request->input(Appointments::find('id_create'));
        $Appointments->id_appointments_types = $request->input(Appointments::find('id_appointments_types'));

        $Appointments->save();
        return response()->json($Appointments);
    }

    //Delete
    public function deleteAppointmentsTypes($id) {
        $AppointmentsTypes = AppointmentsTypes::find($id);
        $AppointmentsTypes->delete();
        echo('Type de rdv bien supprimé');
    }

    public function deleteAppointments($id) {
        $Appointments = Appointments::find($id);
        $Appointments->delete();
        echo('Rdv bien supprimé');
    }

    //Change
    public function changeAppointmentsTypes($id, Request $request) {
        $AppointmentsTypes = AppointmentsTypes::find($id);
        $AppointmentsTypes->name = $request->input('name');
        $AppointmentsTypes->save();
        return response()->json($AppointmentsTypes);
    }

    public function changeAppointments($id, Request $request) {
        $Appointments = Appointments::find($id);
        $Appointments->titleDetails = $request->input('titleDetails');
        $Appointments->descriptionDeatils = $request->input('descriptionDeatils');
        $Appointments->dateDetails = $request->input('dateDetails');

        $Appointments->id_receiver = $request->input(Appointments::find('id_receiver'));
        $Appointments->id_create = $request->input(Appointments::find('id_create'));
        $Appointments->id_appointments_types = $request->input(Appointments::find('id_appointments_types'));
        
        $Appointments->save();
        return response()->json($Appointments);
    }
}
