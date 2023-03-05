<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Master_bidang;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user = User::where('email','admin@gmail.com')->first();
        if (!$user) {
            # code...
            \App\Models\User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make("12345678")
            ]);
        }

        Master_bidang::updateOrCreate([
            'nama' => 'Sekretariat (Tu/Umum)'
        ],[
            'nama' => 'Sekretariat (Tu/Umum)'
        ]);

        Master_bidang::updateOrCreate([
            'nama' => 'Sekretariat (PI/Perencanaan)'
        ],[
            'nama' => 'Sekretariat (PI/Perencanaan)'
        ]);

        Master_bidang::updateOrCreate([
            'nama' => 'Sekretariat (Keuangan)'
        ],[
            'nama' => 'Sekretariat (Keuangan)'
        ]);

        Master_bidang::updateOrCreate([
            'nama' => 'Bidang YanKes'
        ],[
            'nama' => 'Bidang YanKes'
        ]);

        Master_bidang::updateOrCreate([
            'nama' => 'Bidang KesMas'
        ],[
            'nama' => 'Bidang KesMas'
        ]);

        Master_bidang::updateOrCreate([
            'nama' => 'Bidang P2P'
        ],[
            'nama' => 'Bidang P2P'
        ]);

        Master_bidang::updateOrCreate([
            'nama' => 'Bidang KB'
        ],[
            'nama' => 'Bidang KB'
        ]);
    }
}
