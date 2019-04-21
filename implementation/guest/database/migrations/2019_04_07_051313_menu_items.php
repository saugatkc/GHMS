<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MenuItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
                Schema::create('MenuItems', function (Blueprint $table) {
                $table->increments('id');
                $table->string('items');
                $table->unsignedInteger('unitCost');
                $table->string('itemType');
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
        Schema::dropIfExists('MenuItems');
    }
}
