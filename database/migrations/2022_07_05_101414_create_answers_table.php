<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id',true);
            $table->longText('answer');
            $table->integer('id_user')->unsigned();
            $table->integer('id_questions')->unsigned();
            $table->timestamps();
        });

        Schema::table('answers', function ($table) {
            $table
            ->foreign('id_user')
            ->references('id')
            ->on('users');

            $table
            ->foreign('id_questions')
            ->references('id')
            ->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
