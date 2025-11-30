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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('address')->nullable(false);
            $table->string('city_id')->nullable(false);
            $table->string('stars')->nullable(false);
            $table->timestamps();
        });

        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('type')->nullable(false);
            $table->foreignId('hotel_id')->constrained('hotels');
            $table->integer('floor')->nullable(false);
            $table->timestamps();
        });

        Schema::create('room_prices', function (Blueprint $table) {
            $table->id();
            $table->integer('price')->nullable(false);
            $table->foreignId('room_id')->constrained('rooms');
            $table->date('date')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_prices');
        Schema::dropIfExists('rooms');
        Schema::dropIfExists('hotels');
    }
};
