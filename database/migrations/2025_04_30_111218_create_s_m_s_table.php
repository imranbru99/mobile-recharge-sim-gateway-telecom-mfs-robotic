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
        Schema::create('s_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('operator')->nullable();
            $table->text('text');
            $table->string('sender');
            $table->string('simid');
            $table->string('deviceid');
            $table->text('deviceinfo')->nullable();
            $table->integer('simslot')->nullable();
            $table->timestamp('sc_datetime')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_m_s');
    }
};
