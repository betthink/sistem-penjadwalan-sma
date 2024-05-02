<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_kelas extends Model
{
    use HasFactory;
    protected $table = 'tb_kelas';
    protected $primaryKey = 'id_kelas';
    public $timestamps = true;
    protected $fillable = [
        'tingkatan', 'jurusan', 'nomor_kelas', 'wali_kelas'
    ];
    
}
