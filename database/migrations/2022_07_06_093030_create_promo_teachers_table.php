<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_teachers', function (Blueprint $table) {
            $table->increments('id',true);
            $table->integer('teachers_id')->unsigned();
            $table->integer('promos_id')->unsigned();
            $table->timestamps();
        });        
        Schema::table('promo_teachers',function ($table){
            $table->foreign('teachers_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('promo_teachers');
    }
}
