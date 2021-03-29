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
            'nama' => 'asas',
            'username' => 'asas',
            'alamat' => 'asas barat',
            'nik' => '09089867',
            'notelp' => '08212314',
            'level' => 'petugas',
            'password' => Hash::make('asas'),
        ]);
        User::create([
            'nama' => 'usus',
            'username' => 'usus',
            'alamat' => 'usus barat',
            'nik' => '09089867',
            'notelp' => '08212314',
            'level' => 'masyarakat',
            'password' => Hash::make('usus'),
        ]);
    }
}
