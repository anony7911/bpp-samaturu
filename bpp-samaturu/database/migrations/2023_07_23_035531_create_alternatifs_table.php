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
        Schema::create('alternatifs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_alternatif');
            $table->unsignedBigInteger('harga_id');
            $table->unsignedBigInteger('bahanaktif_id');
            $table->unsignedBigInteger('dayatahan_id');
            $table->unsignedBigInteger('hamadibasmi_id');

            $table->foreign('harga_id')->references('id')->on('hargas')->onDelete('cascade');
            $table->foreign('bahanaktif_id')->references('id')->on('bahanaktifs')->onDelete('cascade');
            $table->foreign('dayatahan_id')->references('id')->on('dayatahans')->onDelete('cascade');
            $table->foreign('hamadibasmi_id')->references('id')->on('hamadibasmis')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternatifs');
    }
};
