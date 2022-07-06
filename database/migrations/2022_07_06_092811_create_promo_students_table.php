<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_students', function (Blueprint $table) {
            $table->increments('id',true);
            $table->integer('id_students')->unsigned();
            $table->integer('id_promos')->unsigned();
            $table->timestamps();
        });        
        Schema::table('promo_students',function ($table){
            $table->foreign('id_students')->references('id')->on('users');
            $table->foreign('id_promos')->references('id')->on('promos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promo_students');
    }
}
