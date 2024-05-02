<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_mp extends Model
{
    use HasFactory;
    protected $table = 'tb_mp';
    protected $primaryKey = 'id_mp';
    public $timestamps = true;
    protected $fillable = [
        'nama_mp', 'kode_mp'
    ];
}
