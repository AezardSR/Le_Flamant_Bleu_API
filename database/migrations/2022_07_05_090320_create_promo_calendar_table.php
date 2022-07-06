<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoCalendarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_calendar', function (Blueprint $table) {
            $table->increments('id',true);
            $table->date('startDate');
            $table->date('endDate');
            $table->integer('id_promos')->unsigned();
            $table->timestamps();
        });
        Schema::table('promo_calendar',function ($table){
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
        Schema::dropIfExists('promo_calendar');
    }
}
