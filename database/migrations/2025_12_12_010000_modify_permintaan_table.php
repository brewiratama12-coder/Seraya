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
        Schema::table('permintaan', function (Blueprint $table) {
            // Drop the date columns that are already in jadwal_keberangkatan
            $table->dropColumn(['tanggal_berangkat', 'tanggal_kepulangan']);
            
            // Add foreign key to jadwal_keberangkatan
            $table->unsignedBigInteger('jadwal_keberangkatan_id')->after('paket_id');
            $table->foreign('jadwal_keberangkatan_id')->references('id')->on('jadwal_keberangkatan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permintaan', function (Blueprint $table) {
            // Drop foreign key
            $table->dropForeign(['jadwal_keberangkatan_id']);
            $table->dropColumn('jadwal_keberangkatan_id');
            
            // Restore the date columns
            $table->date('tanggal_berangkat')->after('paket_id');
            $table->date('tanggal_kepulangan')->after('tanggal_berangkat');
        });
    }
};
