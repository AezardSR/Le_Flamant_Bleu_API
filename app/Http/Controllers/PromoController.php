<?php

namespace App\Http\Controllers;

use App\Models\Promos;
use App\Models\PromoStudents;
use App\Models\PromoTeachers;
use App\Models\PromoCalendar;
use App\Models\FormationsTypes;
use App\Models\FormationsFormats;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromoController extends Controller
{
    public function getPromosList(){
        $promo = Promos::all();
        return response()->json($promos);
    }

    public function createPromo(Request $request){
        $promo = new Promos();

        $promo->name = $request->input('name');
        $promo->startDate = $request->input('startDate');
        $promo->endDate = $request->input('endDate');
        $promo->duration = $request->input('duration');

        $promo->id_formationsTypes = FormationsTypes::find(
            intval(
                $request->input('id_formationsTypes')
            )
        )->id;

        $promo->id_formationsFormats = FormationsFormats::find(
            intval(
                $request->input('id_formationsFormats')
            )
        )->id;

        $promo->save();
        return responce()->json($promo);
    }

    public function getOnePromo($id){
        $promo = DB::table('promos')->select('name','startDate','endDate','duration','id_formationsTypes','id_formationsFormats')->where('id','=', $id)->get();
        return response()->json($promo);
    }

    public function editPromo($id, Request $request){
        $promo = DB::table('promos')->where('id','=',$id)->update([$request->input('column') => $request->input('newValue')]);
    }
//promostudents
    public function getPromoStudentsList(){
        $promoStudent = PromoStudents::all();
        return response()->json($promoStudent);
    }

    public function getPromoStudents($id_promos){
        $promoStudent = DB::table('promo_students')->select('id_students')->where('id_promos','=', $id_promos)->get();
        return response()->json($promoStudent);
    }

    public function AddStudentToPromo(Request $request){
        $promoStudent = new PromoStudents();

        $promoStudent->id_students = Users::find(
            intval(
                $request->input('id_students')
            )
        )->id;

        $promoStudent->id_promos = Promos::find(
            intval(
                $request->input('id_promos')
            )
        )->id;

        $promoStudent->save();
        return responce()->json($promoStudent);
    }

    public function editPromoStudent($id, Request $request){
        $promo = DB::table('promo_students')->where('id','=',$id)->update([$request->input('column') => $request->input('newValue')]);
    }
//promoTeachers
    public function getPromoTeachersList(){
        $promoTeacher = PromoTeachers::all();
        return response()->json($promoTeacher);
    }

    public function getPromoTeachers($id_promos){
        $promoTeacher = DB::table('promo_teachers')->select('id_teachers')->where('id_promos','=', $id_promos)->get();
        return response()->json($promoTeacher);
    }

    public function AddTeacherToPromo(Request $request){
        $promoTeacher = new PromoTeachers();

        $promoTeacher->id_teachers = Users::find(
            intval(
                $request->input('id_teachers')
            )
        )->id;
        
        $promoTeacher->id_promos = Promos::find(
            intval(
                $request->input('id_promos')
            )
        )->id;

        $promoTeacher->save();
        return responce()->json($promoTeacher);
    }

    public function editPromoTeacher($id, Request $request){
        $promo = DB::table('promo_teachers')->where('id','=',$id)->update([$request->input('column') => $request->input('newValue')]);
    }

//promoCalendar
    public function getPromoCalendarList(){
        $promoCalendar = PromoCalendar::all();
        return response()->json($promoCalendar);
    }

    public function getPromoCalendar($id_promos){
        $promoCalendar = DB::table('promo_calendar')->select('startDate','endDate')->where('id_promos','=', $id_promos)->get();
        return response()->json($promoCalendar);
    }

    public function AddPromoCalendar(Request $request){
        $promoCalendar = new PromoCalendar();
        $promoCalendar->startDate = $request->input('startDate');
        $promoCalendar->endDate = $request->input('endDate');

        $promoCalendar->id_promos = Promos::find(
            intval(
                $request->input('id_promos')
            )
        )->id;

        $promoCalendar->save();
        return responce()->json($promoCalendar);
    }

    public function editPromoCalendar($id, Request $request){
        $promoCalendar = DB::table('promo_calendar')->where('id','=',$id)->update([$request->input('column') => $request->input('newValue')]);
    }

}
