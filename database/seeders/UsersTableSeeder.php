<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create multiplo users
        DB::table('users')->insert([
            [
                'username' => '01@gmail.com',
                'password' => bcrypt('123456789'),
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'username' => '02@gmail.com',
                'password' => bcrypt('123456789'),
                'created_at' => date('Y-m-d H:i:s ')
            ],
            [
                'username' => '03@gmail.com',
                'password' => bcrypt('123456789'),
                'created_at' => date('Y-m-d H:i:s ')
            ]
        ]);
    }
}
