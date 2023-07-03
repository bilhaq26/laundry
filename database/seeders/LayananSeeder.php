<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Layanan::create([
            'nama' => 'Layanan 1',
            'durasi' => '3',
            'harga' => 10000,
        ]);
        Layanan::create([
            'nama' => 'Layanan 2',
            'durasi' => '2',
            'harga' => 20000,
        ]);
        Layanan::create([
            'nama' => 'Layanan 3',
            'durasi' => '1',
            'harga' => 30000,
        ]);
    }
}
