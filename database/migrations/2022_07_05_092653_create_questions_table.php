<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id',true);
            $table->longText('question');
            $table->integer('id_classes')->unsigned();
            $table->integer('id_users')->unsigned();
            $table->integer('id_categories')->unsigned();
            $table->timestamps();
        });

        Schema::table('questions', function ($table) {
            $table
            ->foreign('id_users')
            ->references('id')
            ->on('users');
        });

        Schema::table('questions', function ($table) {
            $table
            ->foreign('id_classes')
            ->references('id')
            ->on('classes');
        });

        Schema::table('questions', function ($table) {
            $table
            ->foreign('id_categories')
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
        Schema::dropIfExists('questions');
    }
}
