<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_guru_mapel extends Model
{
    use HasFactory;
    protected $table = 'tb_mp_guru';
    protected $primaryKey = 'id_mp_guru';
    public $timestamps = true;
    protected $fillable = [
        'id_guru', 'id_mp'
    ];
}
