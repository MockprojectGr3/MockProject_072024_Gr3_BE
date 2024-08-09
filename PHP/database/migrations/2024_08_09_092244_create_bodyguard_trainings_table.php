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
        Schema::create('bodyguard_trainings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bodyguard_id')->constrained('bodyguards');
            $table->foreignId('training_catalog_id')->constrained('training_catalogs');
            $table->enum('status', ['in_progress', 'completed'])->default('in_progress');
            $table->string('description')->nullable();
            $table->timestamp('start_day')->nullable();
            $table->timestamp('end_day')->nullable();
            $table->softDeletes(); // deleted_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bodyguard_trainings');
    }
};
