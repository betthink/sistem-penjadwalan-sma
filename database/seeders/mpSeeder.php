<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
          
            DB::table('tb_mp')->insert([
                'nama_mp' => $faker->name(),
                'kode_mp' => $faker->unique()->randomNumber(2),
                'created_at' => now(), // Gunakan tanggal dan waktu saat ini
                // 'updated_at' => now(), // Uncomment this line if you want to add updated_at
            ]);
        }
    }
}
