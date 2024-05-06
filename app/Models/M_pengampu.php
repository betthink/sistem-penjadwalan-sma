<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_pengampu extends Model
{
    use HasFactory;
    protected $table = 'tb_pengampu';
    protected $primaryKey = 'id_pengampu';
    public $timestamps = true;
    protected $fillable = [
        'mata_pelajaran', 'guru', 'kelas', 'tahun_akademik'
    ];
}
