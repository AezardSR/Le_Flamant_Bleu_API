<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_contacts', function (Blueprint $table) {
            $table->increments('id',true);
            $table->string('name', 50);
            $table->string('firstname', 50);
            $table->string('mail', 100);
            $table->string('tel', 10);
            $table->string('nameCompany', 50);
            $table->integer('id_users')->unsigned();
            $table->timestamps();
        });

        Schema::table('partner_contacts', function ($table) {
            $table
                ->foreign('id_users')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partner_contacts');
    }
}
