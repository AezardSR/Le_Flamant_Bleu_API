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
            $table->integer('classes_id')->unsigned();
            $table->integer('modules_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('modules_class', function ($table) {
            $table
            ->foreign('classes_id')
            ->references('id')
            ->on('classes')
            ->onDelete('cascade');

            $table
            ->foreign('modules_id')
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
