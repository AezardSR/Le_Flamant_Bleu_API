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

    public function createApplicantsTestSurvey($name,$firstname,$dateSurvey,$mail,$id_entranceTests,$id_formationsFormats,$id_promos){
        $ApplicantsTestSurvey = new ApplicantsTestSurvey();
        $ApplicantsTestSurvey->name = $name;
        $ApplicantsTestSurvey->firstname = $firstname;
        $ApplicantsTestSurvey->dateSurvey = $dateSurvey;
        $ApplicantsTestSurvey->mail = $mail;
        $ApplicantsTestSurvey->id_entranceTests = $id_entranceTests;
        $ApplicantsTestSurvey->id_users = $id_users;
        $ApplicantsTestSurvey->id_promos = $id_promos;
        $ApplicantsTestSurvey->save();
        return responce()->json($ApplicantsTestSurvey);
    }

    public function getOneApplicantsTestSurvey($id){
        $ApplicantsTestSurvey = DB::table('applicants_test_survey')->select('name','firstname','dateSurvey','mail','id_entranceTests','id_users','id_promos')->where('id','=', $id)->get();
        return response()->json($ApplicantsTestSurvey);
    }

    public function editApplicantsTestSurvey($id,$column,$newValue){
        $ApplicantsTestSurvey = DB::table('applicants_test_survey')->where('id','=',$id)->update([$column => $newValue]);
    }

//ApplicantsAnswers
    public function getApplicantsAnswersList(){
        $ApplicantsAnswers = ApplicantsAnswers::all();
        return response()->json($ApplicantsAnswers);
    }

    public function createApplicantsAnswers($answer,$id_surveyAnswers,$id_applicantsTestSurvey){
        $ApplicantsAnswers = new ApplicantsAnswers();
        $ApplicantsAnswers->answer = $answer;
        $ApplicantsAnswers->id_surveyAnswers = $id_surveyAnswers;
        $ApplicantsAnswers->id_applicantsTestSurvey = $id_applicantsTestSurvey;
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

    public function createSurveyAnswers($answer,$correctAnswer,$id_surveys){
        $SurveyAnswers = new SurveyAnswers();
        $SurveyAnswers->answer = $answer;
        $SurveyAnswers->correctAnswer = $correctAnswer;
        $SurveyAnswers->id_surveys = $id_surveys;
        $SurveyAnswers->save();
        return responce()->json($SurveyAnswers);
    }

    public function getOneSurveyAnswers($id){
        $SurveyAnswers = DB::table('applicants_test_survey')->select('answer','correctAnswer','id_surveys')->where('id','=', $id)->get();
        return response()->json($SurveyAnswers);
    }

    public function editSurveyAnswers($id,$column,$newValue){
        $ApplicantsTestSurvey = DB::table('survey_answers')->where('id','=',$id)->update([$column => $newValue]);
    }

//Surveys
    public function getSurveysList(){
        $Surveys = Surveys::all();
        return response()->json($Surveys);
    }

    public function createSurveys($survey){
        $Surveys = new Surveys();
        $Surveys->survey = $survey;
        $Surveys->save();
        return responce()->json($Surveys);
    }

    public function getOneSurvey($id){
        $Surveys = DB::table('surveys')->select('survey')->where('id','=', $id)->get();
        return response()->json($Surveys);
    }

    public function editSurvey($id,$column,$newValue){
        $Surveys = DB::table('surveys')->where('id','=',$id)->update([$column => $newValue]);
    }

//EntranceTestsSurvey
    public function getEntranceTestsSurveyList(){
        $EntranceTestsSurvey = EntranceTestsSurvey::all();
        return response()->json($EntranceTestsSurvey);
    }

    public function createEntranceTestsSurvey($id_entranceTests,$id_surveys){
        $EntranceTestsSurvey = new EntranceTestsSurvey();
        $EntranceTestsSurvey->id_entranceTests = $sid_entranceTestsurvey;
        $EntranceTestsSurvey->id_surveys = $id_surveys;$EntranceTestsSurvey->save();
        return responce()->json($EntranceTestsSurvey);
    }

    public function getOneEntranceTestsSurvey($id){
        $EntranceTestsSurvey = DB::table('entrance_tests_survey')->select('id_entranceTests','id_surveys')->where('id','=', $id)->get();
        return response()->json($EntranceTestsSurvey);
    }

    public function editEntranceTestsSurvey($id,$column,$newValue){
        $Surveys = DB::table('surveys')->where('id','=',$id)->update([$column => $newValue]);
    }
}
