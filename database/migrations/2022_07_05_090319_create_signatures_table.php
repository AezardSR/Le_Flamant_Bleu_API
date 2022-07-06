<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signatures', function (Blueprint $table) {
            $table->increments('id',true);
            $table->integer('id_users')->unsigned();
            $table->integer('id_registrations')->unsigned();
            $table->date('date');
            $table->timestamps('');
        });
        Schema::table('signatures',function ($table){
            $table->foreign('id_users')->references('id')->on('users');
            $table->foreign('id_registrations')->references('id')->on('registrations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('signatures');
    }
}
