<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->increments('id',true);
            $table->date('dateRegistration');
            $table->longText('detailRegistration');
            $table->integer('promos_id')->unsigned();
            $table->integer('registrationTypes_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('registrations',function ($table){
            $table->foreign('promos_id')->references('id')->on('promos')->onDelete('cascade');
            $table->foreign('registrationTypes_id')->references('id')->on('registration_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrations');
    }
}
