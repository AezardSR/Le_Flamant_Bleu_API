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
            $table->integer('id_promos')->unsigned();
            $table->integer('id_registrationTypes')->unsigned();
            $table->timestamps();
        });
        Schema::table('registrations',function ($table){
            $table->foreign('id_promos')->references('id')->on('promos');
            $table->foreign('id_registrationTypes')->references('id')->on('registration_types');
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
