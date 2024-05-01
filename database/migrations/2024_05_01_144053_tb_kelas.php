<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('tb_kelas', function (Blueprint $tb) {
            $tb->id('id_kelas');
            $tb->string('tingkatan');
            $tb->string('jurusan');
            $tb->string('nomor_kelas');
            $tb->string('wali_kelas');
            $tb->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('tb_kelas');
    }
};
