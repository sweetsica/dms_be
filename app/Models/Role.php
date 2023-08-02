<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'role';
    public $timestamps=false;
    public $primaryKey= 'id';
    protected $fillable = [
        'name',
        'description',
        'code',
    ];

}
