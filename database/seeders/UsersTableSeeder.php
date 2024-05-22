<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (DB::table('users')->count() == 0) {
            DB::table('users')->insert([
                'name' => 'Admin',
                'username' => 'Admin',
                'is_active' => true,
                'password' => Hash::make('123456789'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
