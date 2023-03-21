<?php

namespace App\Http\Controllers;

use App\Models\User;
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
    public function deleteAppointmentsTypes($id) {
        $AppointmentsTypes = AppointmentsTypes::find($id);
        $AppointmentsTypes->delete();
    }

    public function deleteAppointments($id) {
        $Appointments = Appointments::find($id);
        $Appointments->delete();
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
