<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Alter enum to include 'rejected'
        DB::statement("ALTER TABLE `permintaan` MODIFY COLUMN `status` ENUM('pending','dispatch','selesai','rejected') NOT NULL DEFAULT 'pending'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE `permintaan` MODIFY COLUMN `status` ENUM('pending','dispatch','selesai') NOT NULL DEFAULT 'pending'");
    }
};
