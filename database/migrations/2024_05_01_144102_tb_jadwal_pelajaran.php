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
        Schema::create('tb_jadwal_pelajaran', function (Blueprint $tb) {
            $tb->id('id_jp');
            $tb->string('id_kelas');
            $tb->string('id_guru');
            $tb->string('hari');
            $tb->string('jam_mulai');
            $tb->string('jam_selesai');
            $tb->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('tb_jadwal_pelajaran');
    }
};
