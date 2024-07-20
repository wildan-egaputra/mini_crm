<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create Admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'usertype' => 'admin', // Menggunakan kolom 'usertype' untuk membedakan jenis pengguna
        ]);

        // Create Superadmin user
        User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@superadmin.com',
            'password' => Hash::make('password'),
            'usertype' => 'superadmin', // Menggunakan kolom 'usertype' untuk membedakan jenis pengguna
        ]);
    }
}
