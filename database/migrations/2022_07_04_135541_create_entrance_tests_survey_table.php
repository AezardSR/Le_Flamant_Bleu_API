<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntranceTestsSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrance_tests_survey', function (Blueprint $table) {
            $table->increments('id',true);
            $table->integer('entranceTests_id')->unsigned();
            $table->integer('surveys_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('entrance_tests_survey',function ($table){
            $table->foreign('entranceTests_id')->references('id')->on('entrance_tests')->onDelete('cascade');
            $table->foreign('surveys_id')->references('id')->on('surveys')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrance_tests_survey');
    }
}
