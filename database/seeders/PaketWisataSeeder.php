<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaketWisata;

class PaketWisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaketWisata::create([
            'nama_paket' => 'Paket Wisata Bromo Sunrise',
            'deskripsi' => 'Nikmati sunrise terbaik di Gunung Bromo dengan paket lengkap: jeep offroad, dokumentasi, makan pagi, dan pengalaman profesional yang aman & nyaman. Tersedia setiap hari dengan guide berpengalaman.',
            'harga' => 350000,
            'jenis_paket' => 'Outdoor Adventure',
            'status' => 'tersedia',
            'gambar' => null,
        ]);

        PaketWisata::create([
            'nama_paket' => 'Paket Wisata Raja Ampat',
            'deskripsi' => 'Jelajahi keindahan bahari Raja Ampat dengan snorkeling di terumbu karang terbaik. Paket all-inclusive dengan akomodasi resort bintang 4, makan 3x sehari, dan pemandu wisata profesional. Durasi 5 hari 4 malam untuk pengalaman tak terlupakan.',
            'harga' => 8500000,
            'jenis_paket' => 'Beach Resort',
            'status' => 'tersedia',
            'gambar' => null,
        ]);

        PaketWisata::create([
            'nama_paket' => 'Paket Wisata Dieng Cultural Tour',
            'deskripsi' => 'Telusuri budaya Jawa di Dieng dengan mengunjungi candi-candi bersejarah dan melihat pemandangan alam yang memukau. Paket include hotel berbintang, makan pagi, dan pemandu berpengetahuan sejarah. Cocok untuk keluarga dan backpacker.',
            'harga' => 1200000,
            'jenis_paket' => 'Cultural Experience',
            'status' => 'tersedia',
            'gambar' => null,
        ]);
    }
}
