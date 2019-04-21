<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
                 Schema::create('OrderItems', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('menuId');
                $table->foreign('menuId')->references('id')->on('MenuItems')->onDelete('cascade');
                $table->unsignedInteger('quantity');
                $table->unsignedInteger('amount');
                $table->unsignedInteger('bookingId');
                $table->foreign('bookingId')->references('id')->on('bookings')->onDelete('cascade');  
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
        Schema::dropIfExists('OrderItems');
    }
}
