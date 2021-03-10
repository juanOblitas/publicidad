<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdvertisingIdAndPhotoIdToAdvertisingPhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advertising_photo', function (Blueprint $table) {
            $table->unsignedBiginteger('advertising_id');
            $table->foreign('advertising_id')->references('id')->on('advertising');
            $table->unsignedBiginteger('photo_id');
            $table->foreign('photo_id')->references('id')->on('photos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advertising_photo', function (Blueprint $table) {
            $table->dropForeign('advertising_photo_advertising_id_foreign');
            $table->dropColumn('advertising_id');
            $table->dropForeign('advertising_photo_photo_id_foreign');
            $table->dropColumn('photo_id');
        });
    }
}
