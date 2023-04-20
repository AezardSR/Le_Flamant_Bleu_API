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
            $table->integer('categories_id')->unsigned();
            $table->integer('modules_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('modules_categories', function ($table) {
            $table
            ->foreign('categories_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade');

            $table
            ->foreign('modules_id')
            ->references('id')
            ->on('modules')
            ->onDelete('cascade');
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
