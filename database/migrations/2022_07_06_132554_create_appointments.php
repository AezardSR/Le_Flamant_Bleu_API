<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id',true);
            $table->string('titleDetails', 50);
            $table->longText('descriptionDetails')->nullable();
            $table->date('dateDetails');
            $table->integer('receiver_id')->unsigned();
            $table->integer('create_id')->unsigned();
            $table->integer('appointments_types_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('appointments', function ($table) {
            $table
                ->foreign('receiver_id')
                ->references('id')
                ->on('users');
            
            $table
                ->foreign('create_id')
                ->references('id')
                ->on('users');

            $table
                ->foreign('appointments_types_id')
                ->references('id')
                ->on('appointments_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
