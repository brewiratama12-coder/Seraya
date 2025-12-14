<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasTable('paket_wisata') && !Schema::hasColumn('paket_wisata', 'harga_asli')) {
            Schema::table('paket_wisata', function (Blueprint $table) {
                $table->decimal('harga_asli', 12, 2)->nullable()->after('harga');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('paket_wisata') && Schema::hasColumn('paket_wisata', 'harga_asli')) {
            Schema::table('paket_wisata', function (Blueprint $table) {
                $table->dropColumn('harga_asli');
            });
        }
    }
};
