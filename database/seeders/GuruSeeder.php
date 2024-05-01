<?php

namespace Database\Seeders;


use App\Models\M_guru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */ 
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('tb_guru')->insert([
                'nama' => $faker->name,
                'kode_guru' => $faker->unique()->randomNumber(2),
                'created_at' => $faker->dateTimeThisMonth(),
                // 'updated_at' => $faker->dateTimeThisMonth(), // Uncomment this line if you want to add updated_at
            ]);
        }
    }
    public function down()
    {
        // Hapus data guru yang dimasukkan oleh seeder
        M_guru::truncate();
    }
}
