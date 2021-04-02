<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'nama' => 'Derick Adelaide',
            'username' => 'admin',
            'alamat' => 'Oklahoma, Florida',
            'nik' => '09089867',
            'notelp' => '08212314',
            'level' => 'petugas',
            'foto' => 'images/def1.jpg',
            'password' => Hash::make('123'),
        ]);
        User::create([
            'nama' => 'Garrick Dwayne',
            'username' => 'rick',
            'alamat' => 'Magelang, Jawa tengah',
            'nik' => '09089867',
            'notelp' => '08212314',
            'level' => 'masyarakat',
            'foto' => 'images/def2.jpg',
            'password' => Hash::make('123'),
        ]);
    }
}
