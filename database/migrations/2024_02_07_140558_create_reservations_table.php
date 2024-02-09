<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('country')->nullable();
            $table->unsignedBigInteger('type')->nullable();
            $table->foreign('type')->references('id')->on('rooms')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('quantity')->nullable();
            $table->string('checkindate')->nullable();
            $table->string('checkoutdate')->nullable();
            $table->string('airportpickup')->nullable();
            $table->text('message')->nullable();
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


    
 
    