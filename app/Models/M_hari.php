<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_hari extends Model
{
    use HasFactory;
    protected $table = 'tb_hari';
    protected $primaryKey = 'id_hari';
    public $timestamps = true;
    protected $fillable = [
        'hari'
    ];
}
