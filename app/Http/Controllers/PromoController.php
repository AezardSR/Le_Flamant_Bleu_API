<?php

namespace App\Http\Controllers;

use App\Models\Promos;
use App\Models\PromoStudents;
use App\Models\PromoTeachers;
use App\Models\PromoCalendar;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromoController extends Controller
{
    public function getPromosList(){
        $promo = Promos::all();
        return response()->json($promos);
    }

    public function createPromo($name,$startDate,$endDate,$duration,$id_formationsTypes,$id_formationsFormats){
        $promo = new Promos();
        $promo->name = $name;
        $promo->startDate = $startDate;
        $promo->endDate = $endDate;
        $promo->duration = $duration;
        $promo->id_formationsTypes = $id_formationsTypes;
        $promo->id_formationsFormats = $id_formationsFormats;
        $promo->save();
        return responce()->json($promo);
    }

    public function getOnePromo($id){
        $promo = DB::table('promos')->select('name','startDate','endDate','duration','id_formationsTypes','id_formationsFormats')->where('id','=', $id)->get();
        return response()->json($promo);
    }

    public function editPromo($id,$column,$newValue){
        $promo = DB::table('promos')->where('id','=',$id)->update([$column => $newValue]);
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

    public function AddStudentToPromo($id_students,$id_promos){
        $promoStudent = new PromoStudents();
        $promoStudent->id_students = $id_students;
        $promoStudent->id_promos = $id_promos;
        $promoStudent->save();
        return responce()->json($promoStudent);
    }

    public function editPromoStudent($id,$column,$newValue){
        $promo = DB::table('promo_students')->where('id','=',$id)->update([$column => $newValue]);
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

    public function AddTeacherToPromo($id_teachers,$id_promos){
        $promoTeacher = new PromoTeachers();

        // $promoTeacher->id_teachers = Parts::find(
        //     intval(
        //         $request->input('id_teachers')
        //     )
        // )->id;
        
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

    public function AddPromoCalendar($startDate,$endDate,$id_promos){
        $promoCalendar = new PromoCalendar();
        $promoCalendar->startDate = $startDate;
        $promoCalendar->endDate = $endDate;
        $promoCalendar->id_promos = $id_promos;
        $promoCalendar->save();
        return responce()->json($promoCalendar);
    }

    public function editPromoCalendar($id,$column,$newValue){
        $promoCalendar = DB::table('promo_calendar')->where('id','=',$id)->update([$column => $newValue]);
    }

}
