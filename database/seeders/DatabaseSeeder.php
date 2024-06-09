<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'asd',
            'username' => 'asd',
            'password' => 'asd'
        ]);

        User::factory()->create([
            'name' => 'admin',
            'username' => 'admin',
            'password' => 'admin',
            'role' => 'admin'
        ]);

        Product::create([
            'product_name' => 'scoopy bekas 2023',
            'product_price' => '1500000',
            'product_qty' => 1,
            'product_image' => 'img/y.png',
            'product_code' => 'sc23',
            'detail' => '-STNK & BPKB LENGKAP -PAJAK MASIH HIDUP -MESIN ST '
        ]);

        Product::create([
            'product_name' => 'scopy matic 2023',
            'product_price' => '15000000',
            'product_qty' => 1,
            'product_image' => 'img/be.jpg',
            'product_code' => 'sc22',
            'detail' => '**(BUKAN KENDARAAN BODONG ATAUPUN KENDARAAN CURIAN)* KEAMANAN FAKTUR YANG KAMI BERIKAN ADALAH:*  📁. PLAT ASLI BUKAN DUPLIKAT 📁. STNK & BPKB ASLI 📁. MASIH MULUS STANDAR PABRIK*  '
        ]);

        Product::create([
            'product_name' => 'HONDA BEAT THN 2022',
            'product_price' => '12500000',
            'product_qty' => 2,
            'product_image' => 'img/mtr1.jpg',
            'product_code' => 'bt22',
            'detail' => '-STNK & BPKB LENGKAP -PAJAK MASIH HIDUP -MESIN STANDAR NORMAL -CAP MULU -LAYAK PAKAI -STATER NORMAL -KELISTRIKAN NORMAL -LAMPU NORMAL -BODY MULUS -CAT ORIGINAL'
        ]);

        
        Product::create([
            'product_name' => 'honda vario thn 2021',
            'product_price' => '6500000',
            'product_qty' => 1,
            'product_image' => 'img/mtr2.jpg',
            'product_code' => 'vr21',
            'detail' => 'Surat* lengkap(stnk bpkb faktur) Siap Bantu Pengurusan Berkas Untuk Luar Kota
✔Mutasi Surat-surat &Plat.
✔Cabut Berkas. 
✔Balik Nama. '
        ]);

        Product::create([
            'product_name' => 'Honda BeAT CBS Sporty',
            'product_price' => '12300000',
            'product_qty' => 2,
            'product_image' => 'img/mtr3.jpg',
            'product_code' => 'cb24',
            'detail' => 'Tipe Mesin 4 – Langkah, SOHC, eSP
Volume Langkah 109.5cc
Sistem Suplai Bahan Bakar Injeksi (PGM-FI)
Diameter X Langkah 47.0 x 63.1 mm
Tipe Tranmisi Otomatis, V-Matic
Rasio Kompresi 10.0 : 1'
        ]);



        Product::create([
            'product_name' => 'honda genio 2023',
            'product_price' => '3500000',
            'product_qty' => 2,
            'product_image' => 'img/mtr4.jpg',
            'product_code' => 'gn23',
            'detail' => 'KELENGKAPAN 
-STNK & BPKB LENGKAP
-PAJAK MASIH HIDUP
-MESIN STANDAR NORMAL
-CAP MULU
-LAYAK PAKAI
-STATER NORMAL
-KELISTRIKAN NORMAL
-LAMPU NORMAL
-BODY MULUS'
        ]);

    }
}
