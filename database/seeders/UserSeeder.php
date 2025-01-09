<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Perbarui atau buat user dengan nama Dena
        User::updateOrCreate(
            ['email' => 'denafaizah@gmail.com'], // Kondisi pencarian berdasarkan email
            [
                'name' => 'Dena',
                'password' => bcrypt('password'),
                'role' => 'admin', // Ganti role menjadi admin
            ]
        );

        // Perbarui atau buat user dengan nama Sabian Syahrian
        User::updateOrCreate(
            ['email' => 'rian@gmail.com'], // Kondisi pencarian berdasarkan email
            [
                'name' => 'Rian',
                'password' => bcrypt('password'),
                'role' => 'operator', // Role tetap sebagai operator
            ]
        );

        User::updateOrCreate(
            ['email' => 'bian@gmail.com'], // Kondisi pencarian berdasarkan email
            [
                'name' => 'Sabian',
                'password' => bcrypt('password'),
                'role' => 'operator', // Role tetap sebagai operator
            ]
        );

        User::updateOrCreate(
            ['email' => 'denul@gmail.com'], // Kondisi pencarian berdasarkan email
            [
                'name' => 'Denul',
                'password' => bcrypt('password'),
                'role' => 'admin', // Role tetap sebagai operator
            ]
        );

        User::updateOrCreate(
            ['email' => 'denii@gmail.com'], // Kondisi pencarian berdasarkan email
            [
                'name' => 'Deni',
                'password' => bcrypt('password'),
                'role' => 'admin', // Role tetap sebagai operator
            ]
        );

        User::updateOrCreate(
            ['email' => 'denaa@gmail.com'], // Kondisi pencarian berdasarkan email
            [
                'name' => 'Denaa',
                'password' => bcrypt('password'),
                'role' => 'admin', // Role tetap sebagai operator
            ]
        );
    }
}
