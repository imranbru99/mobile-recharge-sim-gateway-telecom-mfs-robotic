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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('device_id')->constrained();
            $table->string('telco');
            $table->string('number');
            $table->decimal('amount', 10, 2);
            $table->string('type');
            $table->string('transaction_id')->nullable();
            $table->string('request_id')->nullable();
            $table->string('service_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
