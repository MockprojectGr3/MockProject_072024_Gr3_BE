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
            $table->string('name')->nullable();
            $table->foreignId('address_id')->nullable()->constrained('address');
            $table->foreignId('service_id')->nullable()->constrained('services');
            $table->foreignId('customer_id')->nullable()->constrained('customers');
            $table->foreignId('bodyguard_id')->nullable()->constrained('bodyguards');
            $table->foreignId('timesheets_id')->nullable()->constrained('timesheets');
            $table->softDeletes(); // deleted_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
