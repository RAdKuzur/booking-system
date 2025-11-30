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
            $table->id();
            $table->integer('user_id')->nullable(false);
            $table->string('firstname');
            $table->string('surname');
            $table->string('patronymic')->nullable();
            $table->string('passport')->nullable(false);
            $table->integer('citizenship_id')->nullable(false);
            $table->date('birthdate')->nullable(false);
            $table->datetime('booking_date')->nullable(false);
            $table->datetime('booking_expires_at')->nullable(false);
            $table->timestamps();
        });

        Schema::create('flight_tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings');
            $table->integer('flight_seat_id')->nullable(false);
            $table->integer('tariff')->nullable(false);
            $table->date('date')->nullable(false);
            $table->timestamps();
        });
        Schema::create('hotel_tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings');
            $table->integer('room_id')->nullable(false);
            $table->integer('tariff')->nullable(false);
            $table->date('start_date')->nullable(false);
            $table->date('end_date')->nullable(false);
            $table->timestamps();
        });
        Schema::create('refunds', function (Blueprint $table) {
            $table->id();
            $table->integer('type')->nullable(false);
            $table->integer('ticket_id')->nullable(false);
            $table->datetime('refund_date')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refunds');
        Schema::dropIfExists('flight_tickets');
        Schema::dropIfExists('hotel_tickets');
        Schema::dropIfExists('bookings');
    }
};
