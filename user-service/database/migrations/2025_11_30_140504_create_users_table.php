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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->timestamps();
        });
        Schema::create('rules', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->foreignId('role_id')->constrained('roles');
            $table->string('path')->nullable(false);
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('username')->unique();
            $table->integer('status')->default(0);
            $table->foreignId('role_id')->constrained('roles');
            $table->timestamps();
        });

        Schema::create('tokens', function (Blueprint $table) {
           $table->id();
           $table->string('refresh_token');
           $table->dateTime('expires_at');
           $table->foreignId('user_id')->constrained('users');
           $table->string('device_id');
           $table->boolean('is_revoked')->default(false);
           $table->string('user_agent')->nullable();
           $table->string('ip_address')->nullable();
           $table->timestamps();
        });

        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->string('url')->nullable(false);
            $table->string('user_agent')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('request_method')->nullable(false);
            $table->dateTime('request_time')->nullable(false);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
        Schema::dropIfExists('tokens');
        Schema::dropIfExists('users');
        Schema::dropIfExists('rules');
        Schema::dropIfExists('roles');
    }
};
