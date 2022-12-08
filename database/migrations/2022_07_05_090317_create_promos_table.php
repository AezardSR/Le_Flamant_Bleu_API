<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promos', function (Blueprint $table) {
            $table->increments('id',true);
            $table->string('name',50);
            $table->date('startDate');
            $table->date('endDate');
            $table->integer('duration');
            $table->integer('formationsTypes_id')->unsigned();
            $table->integer('formationsFormats_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('promos',function ($table){
            $table->foreign('formationsTypes_id')->references('id')->on('formations_types');
            $table->foreign('formationsFormats_id')->references('id')->on('formations_formats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promos');
    }
}
