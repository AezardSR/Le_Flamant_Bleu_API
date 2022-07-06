<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsanswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants_answers', function (Blueprint $table) {
            $table->increments('id',true);
            $table->longText('answer');
            $table->integer('id_surveyAnswers')->unsigned();
            $table->integer('id_applicantsTestSurvey')->unsigned();
            $table->timestamps();
        });
        Schema::table('applicants_answers',function ($table){
            $table->foreign('id_surveyAnswers')->references('id')->on('survey_answers');
            $table->foreign('id_applicantsTestSurvey')->references('id')->on('applicants_test_survey');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicants_answers');
    }
}
