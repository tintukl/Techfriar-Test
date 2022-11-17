<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slots', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name', 255);
            $table->string('title', 255);
            $table->string('ext', 255);
            $table->string('token', 255);
            $table->string('url', 255);
            $table->string('thumbnail_url', 255)();
            $table->string('vehicle_number', 255)();
            $table->integer('size');
            $table->dateTime('booking_start_date_time');
            $table->dateTime('booking_end_date_time');
            $table->string('slot', 255);
            $table->string('appointment_number', 255);
            $table->integer('parking_fee');
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
        Schema::dropIfExists('slots');
    }
}
