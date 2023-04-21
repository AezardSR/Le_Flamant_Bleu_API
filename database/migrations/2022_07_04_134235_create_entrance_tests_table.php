<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntranceTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrance_tests', function (Blueprint $table) {
            $table->increments('id',true);
            $table->string('name',30);
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('entrance_tests',function ($table){
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrance_tests');
    }
}
