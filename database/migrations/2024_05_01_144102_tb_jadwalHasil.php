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
            $tb->string('kelas');
            $tb->string('guru');
            $tb->string('mata_pelajaran');
            $tb->string('jam');
            $tb->string('hari');
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
