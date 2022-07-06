<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationsByTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations_by_types', function (Blueprint $table) {
            $table->increments('id',true);
            $table->integer('id_formations_formats')->unsigned();
            $table->integer('id_formations_types')->unsigned();
            $table->timestamps();
        });

        Schema::table('formations_by_types', function ($table) {
            $table
            ->foreign('id_formations_types')
            ->references('id')
            ->on('formations_types');

            $table
            ->foreign('id_formations_formats')
            ->references('id')
            ->on('formations_formats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formations_by_types');
    }
}
