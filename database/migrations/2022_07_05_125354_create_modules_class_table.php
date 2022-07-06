<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules_class', function (Blueprint $table) {
            $table->increments('id',true);
            $table->integer('id_classes')->unsigned();
            $table->integer('id_modules')->unsigned();
            $table->timestamps();
        });

        Schema::table('modules_class', function ($table) {
            $table
            ->foreign('id_classes')
            ->references('id')
            ->on('classes');

            $table
            ->foreign('id_modules')
            ->references('id')
            ->on('modules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules_class');
    }
}
