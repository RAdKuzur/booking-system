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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->timestamps();
        });

        Schema::create('aircrafts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->integer('seats')->nullable(false);
            $table->timestamps();
        });

        Schema::create('planes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('aircraft_id')->constrained('aircrafts');
            $table->string('serial_number')->nullable(false);
            $table->timestamps();
        });

        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plane_id')->constrained('planes');
            $table->integer('number')->nullable(false);
            $table->integer('type')->nullable(false);
            $table->timestamps();
        });

        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('flight_number')->nullable(false);
            $table->foreignId('plane_id')->constrained('planes');
            $table->integer('departure_airport_id')->nullable(false);
            $table->integer('arrival_airport_id')->nullable(false);
            $table->dateTime('departure_time')->nullable(false);
            $table->dateTime('arrival_time')->nullable(false);
            $table->timestamps();
        });

        Schema::create('flight_seats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flight_id')->constrained('flights');
            $table->foreignId('seat_id')->constrained('seats');
            $table->timestamps();
        });

        Schema::create('flight_seat_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flight_seat_id')->constrained('flight_seats');
            $table->date('date')->nullable(false);
            $table->float('price')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flight_seat_prices');
        Schema::dropIfExists('flight_seats');
        Schema::dropIfExists('flights');
        Schema::dropIfExists('seats');
        Schema::dropIfExists('planes');
        Schema::dropIfExists('aircrafts');
        Schema::dropIfExists('companies');
    }
};
