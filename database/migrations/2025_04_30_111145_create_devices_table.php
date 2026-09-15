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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('device_id');
            $table->text('device_info')->nullable();
            $table->string('sim_numbers')->nullable();
            $table->string('operators')->nullable();
            $table->string('telcos')->nullable();
            $table->string('apps_name')->nullable();
            $table->string('types1')->nullable();
            $table->string('types2')->nullable();
            $table->string('balance')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
