<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyanswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_answers', function (Blueprint $table) {
            $table->increments('id',true);
            $table->longText('answer');
            $table->boolean('correctAnswer');
            $table->integer('surveys_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('survey_answers',function ($table){
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
        Schema::dropIfExists('survey_answers');
    }
}
