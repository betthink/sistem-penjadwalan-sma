<?php

namespace Database\Seeders;

use App\Models\M_kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Random;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            $kelas = ["X", "XI", "XII"];
            $jurusan = ["IPA", "IPS"];
            $nomorKelas = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10"];
            DB::table('tb_kelas')->insert([
                'tingkatan' => $faker->randomElement($kelas),
                'jurusan' => $faker->randomElement($jurusan),
                'nomor_kelas' => $faker->randomElement($nomorKelas),
                'wali_kelas' => $faker->date(),
                'created_at' => now(), // Gunakan tanggal dan waktu saat ini
                // 'updated_at' => now(), // Uncomment this line if you want to add updated_at
            ]);
        }
    }
    public function down()
    {
        // Hapus data guru yang dimasukkan oleh seeder
        M_kelas::truncate();
    }
}
