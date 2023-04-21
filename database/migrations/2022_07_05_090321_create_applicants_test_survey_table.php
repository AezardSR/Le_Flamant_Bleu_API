<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTestSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants_test_survey', function (Blueprint $table) {
            $table->increments('id',true);
            $table->string('name',30);
            $table->string('firstname',30);
            $table->date('dateSurvey');
            $table->string('mail',255);
            $table->integer('entranceTests_id')->unsigned();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('promos_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('applicants_test_survey',function ($table){
            $table->foreign('entranceTests_id')->references('id')->on('entrance_tests')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('promos_id')->references('id')->on('promos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicants_test_survey');
    }
}
