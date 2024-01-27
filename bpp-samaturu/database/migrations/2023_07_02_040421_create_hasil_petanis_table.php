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
        Schema::create('hasil_petanis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('petani_id')->constrained('petanis')->onDelete('cascade');
            $table->foreignId('hasil_id')->constrained('hasils')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_petanis');
    }
};
