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
            $table->integer('id_entranceTests')->unsigned();
            $table->integer('id_surveys')->unsigned();
            $table->timestamps();
        });
        Schema::table('entrance_tests_survey',function ($table){
            $table->foreign('id_entranceTests')->references('id')->on('entrance_tests');
            $table->foreign('id_surveys')->references('id')->on('surveys');
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
