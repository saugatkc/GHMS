<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Booking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('bookings', function (Blueprint $table) {
                $table->increments('id');
                $table->datetime('time_from')->nullable();
                $table->datetime('time_to')->nullable();
                $table->unsignedInteger('userId');
                $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
                $table->unsignedInteger('roomId');
                $table->foreign('roomId')->references('roomNo')->on('rooms')->onDelete('cascade');
                $table->string('Status');
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
        Schema::dropIfExists('bookings');
    }
}
