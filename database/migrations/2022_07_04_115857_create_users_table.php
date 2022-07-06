<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id',true);
            $table->string('name', 50);
            $table->string('firstname', 50);
            $table->date('birthdate');
            $table->string('mail', 100);
            $table->string('tel', 10);
            $table->string('password', 20);
            $table->string('adress', 255);
            $table->string('city', 50);
            $table->string('zipCode', 5);
            $table->integer('id_roles')->unsigned();
            $table->integer('id_types')->unsigned();
            $table->timestamps();
        });

        Schema::table('users', function ($table) {
            $table
                ->foreign('id_roles')
                ->references('id')
                ->on('roles');

            $table
                ->foreign('id_types')
                ->references('id')
                ->on('types');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
