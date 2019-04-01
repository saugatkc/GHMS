<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Room extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('rooms', function (Blueprint $table) {
           
            $table->increments('id');
            $table->string('roomType');
            $table->integer('price');

            $table->string('image');
            $table->longText('description');
            $table->string('status');

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
        Schema::dropIfExists('rooms');

    }
}
