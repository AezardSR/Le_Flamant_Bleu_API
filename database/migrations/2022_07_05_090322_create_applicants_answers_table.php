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
            $table->longText('answer')->nullable();
            $table->integer('surveyAnswers_id')->unsigned();
            $table->integer('applicantsTestSurvey_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('applicants_answers',function ($table){
            $table->foreign('surveyAnswers_id')->references('id')->on('survey_answers')->onDelete('cascade');
            $table->foreign('applicantsTestSurvey_id')->references('id')->on('applicants_test_survey')->onDelete('cascade');
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
