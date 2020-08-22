<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('usertoken');
            $table->string('checkin');
            $table->string('checkout');
            $table->integer('numberofperson');
            $table->string('roomtype');
            $table->integer('roomnumber');
            $table->integer('roomprice');
            $table->string('utilities');
            $table->integer('utilitiescharge');
            $table->integer('totalprice');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
