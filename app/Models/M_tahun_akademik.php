<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_tahun_akademik extends Model
{
    use HasFactory;
    protected $table = 'tb_tahun_akademik';
    protected $primaryKey = 'id_ta';
    public $timestamps = false;
    protected $fillable = [
        'tahun_mulai', 'tahun_selesai'
    ];
}
