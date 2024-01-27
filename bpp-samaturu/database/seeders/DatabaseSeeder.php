<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
        ]);

        $entries = [
            [
                'nama' => 'harga',
                'bobot' => 0.30,
                'tipe' => 'cost',
            ],
            [
                'nama' => 'bahan aktif',
                'bobot' => 0.25,
                'tipe' => 'benefit',
            ],
            [
                'nama' => 'daya tahan',
                'bobot' => 0.25,
                'tipe' => 'benefit',
            ],
            [
                'nama' => 'hama dibasmi',
                'bobot' => 0.20,
                'tipe' => 'benefit',
            ],
        ];

        foreach ($entries as $entry) {
            \App\Models\Kriteria::create($entry);
        }

        $harga = [
            [
                'nama' => '< Rp 30.000',
                'nilai' => 1,
            ],[
                'nama' => 'Rp 30.000 - Rp 50.000',
                'nilai' => 2,
            ],[
                'nama' => 'Rp 50.000 - Rp 70.000',
                'nilai' => 3,
            ],[
                'nama' => 'Rp 70.000 - Rp 90.000',
                'nilai' => 4,
            ],[
                'nama' => '> Rp 90.000',
                'nilai' => 5,
            ]
        ];

        foreach ($harga as $entry) {
            \App\Models\Harga::create($entry);
        }

        $bahanaktif = [
            [
                'nama' => '1 Bahan Aktif',
                'nilai' => 1,
            ],[
                'nama' => '> 1 Bahan Aktif',
                'nilai' => 2,
            ]
        ];

        foreach ($bahanaktif as $entry) {
            \App\Models\Bahanaktif::create($entry);
        }

        $dayatahan = [
            [
                'nama' => '1 Tahun',
                'nilai' => 1,
            ],[
                'nama' => '2 Tahun',
                'nilai' => 2,
            ],[
                'nama' => '3 Tahun',
                'nilai' => 3,
            ],[
                'nama' => '4 Tahun',
                'nilai' => 4,
            ],[
                'nama' => '> 4 Tahun',
                'nilai' => 5,
            ]
        ];

        foreach ($dayatahan as $entry) {
            \App\Models\Dayatahan::create($entry);
        }

        $hamadibasmi = [
            [
                'nama' => '1 Hama',
                'nilai' => 1,
            ],[
                'nama' => '2 Hama',
                'nilai' => 2,
            ],[
                'nama' => '3 Hama',
                'nilai' => 3,
            ],[
                'nama' => '4 Hama',
                'nilai' => 4,
            ],[
                'nama' => '>= 5 Hama',
                'nilai' => 5,
            ]
        ];

        foreach ($hamadibasmi as $entry) {
            \App\Models\Hamadibasmi::create($entry);
        }

        $alternatif = [
            [
                'nama_alternatif' => 'Abuki 50 SL',
                'harga_id' => 2,
                'bahanaktif_id' => 1,
                'dayatahan_id' => 2,
                'hamadibasmi_id' => 3,
            ],[
                'nama_alternatif' => 'Acqura 500 EC',
                'harga_id' => 3,
                'bahanaktif_id' => 1,
                'dayatahan_id' => 3,
                'hamadibasmi_id' => 1,
            ],[
                'nama_alternatif' => 'Actara 25 WG',
                'harga_id' => 4,
                'bahanaktif_id' => 1,
                'dayatahan_id' => 4,
                'hamadibasmi_id' => 2,
            ],[
                'nama_alternatif' => 'Admire 200 SL',
                'harga_id' => 5,
                'bahanaktif_id' => 1,
                'dayatahan_id' => 5,
                'hamadibasmi_id' => 4,
            ],[
                'nama_alternatif' => 'Agrothrin 2,5 EC',
                'harga_id' => 1,
                'bahanaktif_id' => 1,
                'dayatahan_id' => 1,
                'hamadibasmi_id' => 5,
            ],[
                'nama_alternatif' => 'Alphashield 2,5 EC',
                'harga_id' => 2,
                'bahanaktif_id' => 1,
                'dayatahan_id' => 2,
                'hamadibasmi_id' => 3,
            ],[
                'nama_alternatif' => 'Alphashield 5 EC',
                'harga_id' => 3,
                'bahanaktif_id' => 1,
                'dayatahan_id' => 3,
                'hamadibasmi_id' => 1,
            ],[
                'nama_alternatif' => 'Alphashield 50 EC',
                'harga_id' => 4,
                'bahanaktif_id' => 1,
                'dayatahan_id' => 4,
                'hamadibasmi_id' => 2,
            ]
        ];

        foreach ($alternatif as $entry) {
            \App\Models\Alternatif::create($entry);
        }
    }
}
