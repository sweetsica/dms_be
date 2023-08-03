<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    use HasFactory;
    public $timestamps = false;
    protected $table = 'personnel';
    protected $fillable = [
        'name',
        'email',
        'password',
        'description',
        'code',
        'department_id',
        'position_id',
        'position_level_id',
        'area_id',
        'phone',
        'form',
        'role',
        'status',
    ];
}
