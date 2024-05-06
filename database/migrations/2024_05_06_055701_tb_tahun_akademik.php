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
        Schema::create('tb_tahun_akademik', function (Blueprint $tb) {
            $tb->id('id_ta');
            $tb->string('tahun_mulai');
            $tb->string('tahun_selesai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('tb_tahun_akademik');
    }
};
