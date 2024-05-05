<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_jam extends Model
{
    use HasFactory;
    protected $table = 'tb_jam';
    protected $primaryKey = 'id_jam';
    public $timestamps = false;
    protected $fillable = [
        'jam_mulai', 'jam_selesai'
    ];
}
