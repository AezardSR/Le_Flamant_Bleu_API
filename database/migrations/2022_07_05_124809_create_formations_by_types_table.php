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
            $table->integer('formationsFormats_id')->unsigned();
            $table->integer('formationsTypes_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('formations_by_types', function ($table) {
            $table
            ->foreign('formationsTypes_id')
            ->references('id')
            ->on('formations_types')
            ->onDelete('cascade');

            $table
            ->foreign('formationsFormats_id')
            ->references('id')
            ->on('formations_formats')
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
        Schema::dropIfExists('formations_by_types');
    }
}
