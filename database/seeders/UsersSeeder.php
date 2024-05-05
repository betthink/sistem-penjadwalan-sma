<?php

namespace Database\Seeders;

use App\Models\M_user;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        {
            DB::table('tb_users')->insert([
                'username' => 'admin',
                'password' => Hash::make('123'), // Menggunakan Hash::make() untuk menghash kata sandi
                'role' => 'admin',
                'created_at' => now(),
                // 'updated_at' => now(),
            ]);
        }
    }
    public function down()
    {
        // Hapus data  yang dimasukkan oleh seeder
        M_user::truncate();
    }
}
