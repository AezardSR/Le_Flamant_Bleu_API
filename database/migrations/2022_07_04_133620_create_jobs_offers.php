<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsOffers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs_offers', function (Blueprint $table) {
            $table->increments('id',true);
            $table->string('name', 50);
            $table->date('dateOffers');
            $table->longText('description');
            $table->string('link', 255);
            $table->integer('id_users')->unsigned();
            $table->integer('id_partnerContacts')->unsigned();
            $table->timestamps();
        });

        Schema::table('jobs_offers', function ($table) {
            $table
                ->foreign('id_users')
                ->references('id')
                ->on('users');

            $table
                ->foreign('id_partnerContacts')
                ->references('id')
                ->on('partner_contacts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs_offers');
    }
}
