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
        Schema::create('jadwal_keberangkatan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paket_id');
            $table->date('tanggal_keberangkatan');
            $table->time('jam_keberangkatan')->nullable();
            $table->integer('kuota')->nullable(); // jumlah kuota keberangkatan
            $table->integer('peserta_terdaftar')->default(0);
            $table->enum('status', ['tersedia', 'penuh', 'batal'])->default('tersedia');
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->foreign('paket_id')->references('id')->on('paket_wisata')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_keberangkatan');
    }
};
