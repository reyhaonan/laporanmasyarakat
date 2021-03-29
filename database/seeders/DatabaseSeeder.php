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
        return User::create([
            'nama' => 'asas',
            'username' => 'asas',
            'alamat' => 'asas',
            'nik' => 'nik',
            'password' => Hash::make('asas'),
        ]);
    }
}
