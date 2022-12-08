<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExercicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercices', function (Blueprint $table) {
            $table->increments('id',true);
            $table->string('name', 50);
            $table->longText('content')->nullable();
            $table->string('image', 255)->nullable();
            $table->string('file', 255)->nullable();
            $table->integer('categorie_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('exercices', function ($table) {
            $table
                ->foreign('categorie_id')
                ->references('id')
                ->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exercices');
    }
}
