<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules_categories', function (Blueprint $table) {
            $table->increments('id',true);
            $table->integer('id_categories')->unsigned();
            $table->integer('id_modules')->unsigned();
            $table->timestamps();
        });

        Schema::table('modules_categories', function ($table) {
            $table
            ->foreign('id_categories')
            ->references('id')
            ->on('categories');

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
        Schema::dropIfExists('modules_categories');
    }
}
