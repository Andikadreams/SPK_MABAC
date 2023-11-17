<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Andika Ainur Wibowo',
                'email' => 'andikapelanggan@gmail.com',
                'password' => Hash::make('password'),
                'level' => 'pelanggan',
            ],
            [
                'name' => 'Andika Ainur',
                'email' => 'andikaadmin@gmail.com',
                'password' => Hash::make('password'),
                'level' => 'admin',
            ],
            [
                'name' => 'Andika',
                'email' => 'andikaowner@gmail.com',
                'password' => Hash::make('password'),
                'level' => 'owner',
            ],
        ];

        DB::table('users')->insert($users);
    }
}
