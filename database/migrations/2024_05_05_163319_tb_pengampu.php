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
        Schema::create('tb_pengampu', function (Blueprint $tb) {
            $tb->id('id_pengampu');
            $tb->string('mata_pelajaran');
            $tb->string('guru');
            $tb->string('kelas');
            $tb->string('tahun_akademik');
            // $tb->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('tb_pengampu');
    }
};
