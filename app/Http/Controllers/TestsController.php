<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\ApplicantsTestSurvey;
use App\Models\ApplicantsAnswers;
use App\Models\SurveyAnswers;
use App\Models\Surveys;
use App\Models\EntranceTests;
use App\Models\EntranceTestsSurvey;
use App\Models\Promos;

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

        $ApplicantsTestSurvey->entranceTests_id = EntranceTestsSurvey::find(
            intval(
                $request->input('entranceTests_id')
            )
        )->id;

        $ApplicantsTestSurvey->user_id = user::find(
            intval(
                $request->input('user_id')
            )
        )->id;

        $ApplicantsTestSurvey->promos_id = Promos::find(
            intval(
                $request->input('promos_id')
            )
        )->id;

        $ApplicantsTestSurvey->save();
        return response()->json($ApplicantsTestSurvey);
    }

    public function getOneApplicantsTestSurvey($id){
        $ApplicantsTestSurvey = DB::table('applicants_test_survey')->select('name','firstname','dateSurvey','mail','entranceTests_id','user_id','promos_id')->where('id','=', $id)->get();
        return response()->json($ApplicantsTestSurvey);
    }

    public function editApplicantsTestSurvey($id, Request $request){
        $ApplicantsTestSurvey = DB::table('applicants_test_survey')->where('id','=',$id)->update([$request->input('column') => $request->input('newValue')]);
    }

//applicant-answerss
    public function getApplicantsAnswersList(){
        $ApplicantsAnswers = ApplicantsAnswers::all();
        return response()->json($ApplicantsAnswers);
    }

    public function createApplicantsAnswers(Request $request){
        $ApplicantsAnswers = new ApplicantsAnswers();
        $ApplicantsAnswers->answer = $request->input('answer');

        $ApplicantsAnswers->surveyAnswers_id = SurveyAnswers::find(
            intval(
                $request->input('surveyAnswers_id')
            )
        )->id;

        $ApplicantsAnswers->applicantsTestSurvey_id = ApplicantsTestSurvey::find(
            intval(
                $request->input('applicantsTestSurvey_id')
            )
        )->id;

        $ApplicantsAnswers->save();
        return response()->json($ApplicantsAnswers);
    }

    public function getApplicantAnswers($id){
        $ApplicantsAnswers = DB::table('applicants_test_survey')->select('answer','surveyAnswers_id')->where('id','=', $id)->get();
        return response()->json($ApplicantsAnswers);
    }

//survey-answers
    public function getSurveyAnswersList(){
        $SurveyAnswers = SurveyAnswers::all();
        return response()->json($SurveyAnswers);
    }

    public function createSurveyAnswers(Request $request){
        $SurveyAnswers = new SurveyAnswers();
        $SurveyAnswers->answer = $request->input('answer');
        $SurveyAnswers->correctAnswer = $request->input('correctAnswer');

        $SurveyAnswers->surveys_id = Surveys::find(
            intval(
                $request->input('surveys_id')
            )
        )->id;

        $SurveyAnswers->save();
        return response()->json($SurveyAnswers);
    }

    public function getOneSurveyAnswers($id){
        $SurveyAnswers = DB::table('applicants_test_survey')->select('answer','correctAnswer','surveys_id')->where('id','=', $id)->get();
        return response()->json($SurveyAnswers);
    }

    public function editSurveyAnswers($id, Request $request){
        $ApplicantsTestSurvey = DB::table('survey_answers')->where('id','=',$id)->update([$request->input('column') => $request->input('newValue')]);
    }

//surveys
    public function getSurveysList(){
        $Surveys = Surveys::all();
        return response()->json($Surveys);
    }

    public function createSurveys(Request $request){
        $Surveys = new Surveys();
        $Surveys->survey = $request->input('survey');
        $Surveys->save();
        return response()->json($Surveys);
    }

    public function getOneSurvey($id){
        $Surveys = DB::table('surveys')->select('survey')->where('id','=', $id)->get();
        return response()->json($Surveys);
    }

    public function editSurvey($id, Request $request){
        $Surveys = DB::table('surveys')->where('id','=',$id)->update([$request->input('column') => $request->input('newValue')]);
    }

//entrance-test-surveys
    public function getEntranceTestsSurveyList(){
        $EntranceTestsSurvey = EntranceTestsSurvey::all();
        return response()->json($EntranceTestsSurvey);
    }

    public function createEntranceTestsSurvey(Request $request){
        $EntranceTestsSurvey = new EntranceTestsSurvey();

        $EntranceTestsSurvey->entranceTests_id = EntranceTests::find(
            intval(
                $request->input('entranceTests_id')
            )
        )->id;

        $EntranceTestsSurvey->surveys_id = Surveys::find(
            intval(
                $request->input('surveys_id')
            )
        )->id;
        return response()->json($EntranceTestsSurvey);
    }

    public function getOneEntranceTestsSurvey($id){
        $EntranceTestsSurvey = DB::table('entrance_tests_survey')->select('entranceTests_id','surveys_id')->where('id','=', $id)->get();
        return response()->json($EntranceTestsSurvey);
    }

    public function editEntranceTestsSurvey($id, Request $request){
        $Surveys = DB::table('surveys')->where('id','=',$id)->update([$request->input('column') => $request->input('newValue')]);
    }
}
