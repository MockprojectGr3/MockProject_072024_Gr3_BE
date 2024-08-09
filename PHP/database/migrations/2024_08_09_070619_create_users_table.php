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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('address_id')->constrained('address');
            $table->enum('role', ['admin', 'customer', 'bodyguard', 'staff'])->nullable();
            $table->string('full_name')->nullable();
            $table->string('user_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->dateTime('day_of_birth')->nullable();
            $table->softDeletes(); // deleted_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
