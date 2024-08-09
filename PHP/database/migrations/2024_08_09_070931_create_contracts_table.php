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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('address_id')->constrained('address');
            $table->foreignId('company_id')->nullable()->constrained('companies');
            $table->foreignId('service_request_id')->nullable()->constrained('service_requests');
            $table->datetime('start_time')->nullable();
            $table->datetime('end_time')->nullable();
            $table->float('price')->nullable();
            $table->string('raiting')->nullable();
            $table->enum('status', ['pending', 'unsigned', 'signed'])->default('pending');
            $table->softDeletes(); // deleted_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
