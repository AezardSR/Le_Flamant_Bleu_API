<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id',true);
            $table->string('name', 50);
            $table->longText('content');
            $table->integer('duration');
            $table->integer('id_parts')->unsigned();
            $table->timestamps();
        });

        Schema::table('classes', function ($table) {
            $table
                ->foreign('id_parts')
                ->references('id')
                ->on('parts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
