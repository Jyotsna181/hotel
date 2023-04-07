<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
            Schema::create('bookings', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id');
                $table->string('room_type_1'); 
                $table->integer('no_room_1');
                $table->string('room_type_2')->nullable(); 
                $table->integer('no_room_2')->nullable();
                $table->string('room_type_3')->nullable(); // room type for room 1
                $table->integer('no_room_3')->nullable();
                $table->string('room_type_4')->nullable(); // room type for room 1
                $table->integer('no_room_4')->nullable();
                $table->string('name');
                $table->string('email');
                $table->string('phone');
                $table->date('checkin_date');
                $table->date('checkout_date');
                $table->integer('discount')->nullable();
                $table->string('mealplan');
                $table->integer('adult');
                $table->string('booking_status');
                $table->string('booking_source');
                $table->string('booking_type');
                $table->string('note')->nullable();
                $table->string('cost');
                $table->string('gst');
                $table->string('total_cost');
                $table->timestamps();
            });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
