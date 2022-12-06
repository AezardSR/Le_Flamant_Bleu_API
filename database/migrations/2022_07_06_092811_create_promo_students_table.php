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
            $table->integer('students_id')->unsigned();
            $table->integer('promos_id')->unsigned();
            $table->timestamps();
        });        
        Schema::table('promo_students',function ($table){
            $table->foreign('students_id')->references('id')->on('users');
            $table->foreign('promos_id')->references('id')->on('promos');
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
