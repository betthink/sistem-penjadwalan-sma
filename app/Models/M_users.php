<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_users extends Model implements Authenticatable
{
    use HasFactory;
    use \Illuminate\Auth\Authenticatable;

    protected $table = 'tb_users';
    protected $primaryKey = 'id_user';
    public $timestamps = true;
    protected $fillable = [
        'username',
        'password',
        'role',
    ];
}
