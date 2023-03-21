<?php

namespace App\Http\Controllers;

use App\Models\Promos;
use App\Models\PromoStudents;
use App\Models\PromoTeachers;
use App\Models\PromoCalendar;
use App\Models\FormationsTypes;
use App\Models\FormationsFormats;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromoController extends Controller
{

    public function getPromosTypes(){
        $promo = FormationsTypes::all();
        return response()->json($promo);
    }

    public function getPromosFormat(){
        $promo = FormationsFormats::all();
        return response()->json($promo);
    }

    public function getPromosList(){
        $promo = Promos::all();
        return response()->json($promo);
    }

    public function deletePromos($id) {
        $promo = Promos::find($id);
        $promo->promo_calendar()->delete();
        $promo->promo_student()->delete();
        $promo->signatures()->delete(); // supprime les enregistrements liés dans la table "signatures" d'abord
        $promo->registrations()->delete(); // supprime les enregistrements dans la table "registrations" ensuite
        $promo->delete();
    }

    public function createPromo(Request $request){
        $promo = new Promos();

        $promo->name = $request->input('name');
        $promo->startDate = $request->input('startDate');
        $promo->endDate = $request->input('endDate');
        $promo->duration = $request->input('duration');

        $promo->formationsTypes_id = FormationsTypes::find(
            intval(
                $request->input('formationsTypes_id')
            )
        )->id;

        $promo->formationsFormats_id = FormationsFormats::find(
            intval(
                $request->input('formationsFormats_id')
            )
        )->id;

        $promo->save();
        return response()->json($promo);
    }

    public function getOnePromo($id){
        $promo = DB::table('promos')->select('name','startDate','endDate','duration','formationsTypes_id','formationsFormats_id')->where('id','=', $id)->get();
        return response()->json($promo);
    }

    public function editPromo($id, Request $request){
        $promo = DB::table('promos')->where('id','=',$id);
        $promo->update([
            'name' => $request->input('name'),
            'startDate' => $request->input('startDate'),
            'endDate' => $request->input('endDate'),
            'duration' => $request->input('duration'),
            'formationsTypes_id' => $request->input('formationsTypes_id'),
            'formationsFormats_id' => $request->input('formationsFormats_id'),
        ]);
    }
//promo-studentss
    public function getPromoStudentsList(){
        $promoStudent = PromoStudents::all();
        return response()->json($promoStudent);
    }

    public function getPromoStudents($promos_id){
        $promoStudent = DB::table('promo_students')->select('students_id')->where('promos_id','=', $promos_id)->get();
        return response()->json($promoStudent);
    }

    public function AddStudentToPromo(Request $request){
        $promoStudent = new PromoStudents();

        $promoStudent->students_id = User::find(
            intval(
                $request->input('students_id')
            )
        )->id;

        $promoStudent->promos_id = Promos::find(
            intval(
                $request->input('promos_id')
            )
        )->id;

        $promoStudent->save();
        return response()->json($promoStudent);
    }

    public function editPromoStudent($id, Request $request){
        $promo = DB::table('promo_students')->where('id','=',$id)->update([$request->input('column') => $request->input('newValue')]);
    }
//promo-teacherss
    public function getPromoTeachersList(){
        $promoTeacher = PromoTeachers::all();
        return response()->json($promoTeacher);
    }

    public function getPromoTeachers($promos_id){
        $promoTeacher = DB::table('promo_teachers')->select('teachers_id')->where('promos_id','=', $promos_id)->get();
        return response()->json($promoTeacher);
    }

    public function AddTeacherToPromo(Request $request){
        $promoTeacher = new PromoTeachers();

        $promoTeacher->teachers_id = user::find(
            intval(
                $request->input('teachers_id')
            )
        )->id;
        
        $promoTeacher->promos_id = Promos::find(
            intval(
                $request->input('promos_id')
            )
        )->id;

        $promoTeacher->save();
        return response()->json($promoTeacher);
    }

    public function editPromoTeacher($id, Request $request){
        $promo = DB::table('promo_teachers')->where('id','=',$id)->update([$request->input('column') => $request->input('newValue')]);
    }

//promo-calendars
    public function getPromoCalendarList(){
        $promoCalendar = PromoCalendar::all();
        return response()->json($promoCalendar);
    }

    public function getPromoCalendar($promos_id){
        $promoCalendar = DB::table('promo_calendar')->select('startDate','endDate')->where('promos_id','=', $promos_id)->get();
        return response()->json($promoCalendar);
    }

    public function AddPromoCalendar(Request $request){
        $promoCalendar = new PromoCalendar();
        $promoCalendar->startDate = $request->input('startDate');
        $promoCalendar->endDate = $request->input('endDate');

        $promoCalendar->promos_id = Promos::find(
            intval(
                $request->input('promos_id')
            )
        )->id;

        $promoCalendar->save();
        return response()->json($promoCalendar);
    }

    public function editPromoCalendar($id, Request $request){
        $promoCalendar = DB::table('promo_calendar')->where('id','=',$id)->update([$request->input('column') => $request->input('newValue')]);
    }

}
