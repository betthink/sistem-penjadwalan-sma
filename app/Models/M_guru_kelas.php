<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_guru_kelas extends Model
{
    use HasFactory;
    protected $table = 'tb_kelas_guru';
    protected $primaryKey = 'id_kg';
    public $timestamps = true;
    protected $fillable = [
        'id_guru', 'id_kelas'
    ];
}
