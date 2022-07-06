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
            $table->longText('contenu');
            $table->integer('id_parts')->unsigned();
            $table->timestamps();
        });

        Schema::table('exercices', function ($table) {
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
        Schema::dropIfExists('exercices');
    }
}
