<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisingPhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertising_photo', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('is_visible_icon');
            $table->enum('position_icon_horizontal',['left','right','center']);
            $table->enum('position_icon_vertical',['up','down','middle']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertising_photo');
    }
}
