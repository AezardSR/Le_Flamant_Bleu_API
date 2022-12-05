<?php

namespace App\Http\Controllers;

use App\Models\ApplicantsTestSurvey;
use App\Models\ApplicantsAnswers;
use App\Models\SurveyAnswers;
use App\Models\Surveys;
use App\Models\EntranceTestsSurvey;

use Illuminate\Http\Request;

class TestsController extends Controller
{
//applicants_test_survey
    public function getApplicantsTestSurveyList(){
        $ApplicantsTestSurvey = ApplicantsTestSurvey::all();
        return response()->json($ApplicantsTestSurvey);
    }

    public function createApplicantsTestSurvey(Request $request){
        $ApplicantsTestSurvey = new ApplicantsTestSurvey();

        $ApplicantsTestSurvey->name = $request->input('name');
        $ApplicantsTestSurvey->firstname = $request->input('firstname');
        $ApplicantsTestSurvey->dateSurvey = $request->input('dateSurvey');
        $ApplicantsTestSurvey->mail = $request->input('mail');

        $ApplicantsTestSurvey->id_entranceTests = EntranceTestsSurvey::find(
            intval(
                $request->input('id_entranceTests')
            )
        )->id;

        $ApplicantsTestSurvey->id_users = Users::find(
            intval(
                $request->input('id_users')
            )
        )->id;

        $ApplicantsTestSurvey->id_promos = Promos::find(
            intval(
                $request->input('id_promos')
            )
        )->id;

        $ApplicantsTestSurvey->save();
        return responce()->json($ApplicantsTestSurvey);
    }

    public function getOneApplicantsTestSurvey($id){
        $ApplicantsTestSurvey = DB::table('applicants_test_survey')->select('name','firstname','dateSurvey','mail','id_entranceTests','id_users','id_promos')->where('id','=', $id)->get();
        return response()->json($ApplicantsTestSurvey);
    }

    public function editApplicantsTestSurvey($id, Request $request){
        $ApplicantsTestSurvey = DB::table('applicants_test_survey')->where('id','=',$id)->update([$request->input('column') => $request->input('newValue')]);
    }

//ApplicantsAnswers
    public function getApplicantsAnswersList(){
        $ApplicantsAnswers = ApplicantsAnswers::all();
        return response()->json($ApplicantsAnswers);
    }

    public function createApplicantsAnswers(Request $request){
        $ApplicantsAnswers = new ApplicantsAnswers();
        $ApplicantsAnswers->answer = $request->input('answer');

        $ApplicantsAnswers->id_surveyAnswers = SurveyAnswers::find(
            intval(
                $request->input('id_surveyAnswers')
            )
        )->id;

        $ApplicantsAnswers->id_applicantsTestSurvey = ApplicantsTestSurvey::find(
            intval(
                $request->input('id_applicantsTestSurvey')
            )
        )->id;

        $ApplicantsAnswers->save();
        return responce()->json($ApplicantsAnswers);
    }

    public function getApplicantAnswers($id){
        $ApplicantsAnswers = DB::table('applicants_test_survey')->select('answer','id_surveyAnswers')->where('id','=', $id)->get();
        return response()->json($ApplicantsAnswers);
    }

//SurveyAnswers
    public function getSurveyAnswersList(){
        $SurveyAnswers = SurveyAnswers::all();
        return response()->json($SurveyAnswers);
    }

    public function createSurveyAnswers(Request $request){
        $SurveyAnswers = new SurveyAnswers();
        $SurveyAnswers->answer = $request->input('answer');
        $SurveyAnswers->correctAnswer = $request->input('correctAnswer');

        $SurveyAnswers->id_surveys = Surveys::find(
            intval(
                $request->input('id_surveys')
            )
        )->id;

        $SurveyAnswers->save();
        return responce()->json($SurveyAnswers);
    }

    public function getOneSurveyAnswers($id){
        $SurveyAnswers = DB::table('applicants_test_survey')->select('answer','correctAnswer','id_surveys')->where('id','=', $id)->get();
        return response()->json($SurveyAnswers);
    }

    public function editSurveyAnswers($id, Request $request){
        $ApplicantsTestSurvey = DB::table('survey_answers')->where('id','=',$id)->update([$request->input('column') => $request->input('newValue')]);
    }

//Surveys
    public function getSurveysList(){
        $Surveys = Surveys::all();
        return response()->json($Surveys);
    }

    public function createSurveys(Request $request){
        $Surveys = new Surveys();
        $Surveys->survey = $request->input('survey');
        $Surveys->save();
        return responce()->json($Surveys);
    }

    public function getOneSurvey($id){
        $Surveys = DB::table('surveys')->select('survey')->where('id','=', $id)->get();
        return response()->json($Surveys);
    }

    public function editSurvey($id, Request $request){
        $Surveys = DB::table('surveys')->where('id','=',$id)->update([$request->input('column') => $request->input('newValue')]);
    }

//EntranceTestsSurvey
    public function getEntranceTestsSurveyList(){
        $EntranceTestsSurvey = EntranceTestsSurvey::all();
        return response()->json($EntranceTestsSurvey);
    }

    public function createEntranceTestsSurvey(Request $request){
        $EntranceTestsSurvey = new EntranceTestsSurvey();

        $EntranceTestsSurvey->id_entranceTests = EntranceTests::find(
            intval(
                $request->input('id_entranceTests')
            )
        )->id;

        $EntranceTestsSurvey->id_surveys = Surveys::find(
            intval(
                $request->input('id_surveys')
            )
        )->id;
        return responce()->json($EntranceTestsSurvey);
    }

    public function getOneEntranceTestsSurvey($id){
        $EntranceTestsSurvey = DB::table('entrance_tests_survey')->select('id_entranceTests','id_surveys')->where('id','=', $id)->get();
        return response()->json($EntranceTestsSurvey);
    }

    public function editEntranceTestsSurvey($id, Request $request){
        $Surveys = DB::table('surveys')->where('id','=',$id)->update([$request->input('column') => $request->input('newValue')]);
    }
}
