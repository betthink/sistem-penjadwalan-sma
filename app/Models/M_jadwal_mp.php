<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_jadwal_mp extends Model
{
    use HasFactory;
    protected $table = 'tb_jadwal_pelajaran';
    protected $primaryKey = 'id_jp';
    public $timestamps = true;
    protected $fillable = [
        'id_kelas', 'id_guru', 'hari', 'jam_mulai', 'jam_selesai'
    ];
}
