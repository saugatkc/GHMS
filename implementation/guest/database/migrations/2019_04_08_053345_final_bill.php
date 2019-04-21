<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FinalBill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
                    Schema::create('finalBills', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('bookingId');
                $table->foreign('bookingId')->references('id')->on('bookings')->onDelete('cascade');
                $table->unsignedInteger('noOfNights');
                $table->unsignedInteger('roomTotal');
                $table->unsignedInteger('orderTotal');
                $table->unsignedInteger('grandTotal');
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
        Schema::dropIfExists('finalBills');
    }
}
