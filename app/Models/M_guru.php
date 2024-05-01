<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_guru extends Model
{
    use HasFactory;
    protected $table = 'tb_guru';
    protected $primaryKey = 'id_guru';
    public $timestamps = true;
    protected $fillable = [
        'nama', 'kode_guru'
    ];
}
