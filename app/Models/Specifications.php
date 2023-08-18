<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specifications extends Model
{
    use HasFactory;

    protected $table = 'specifications';
    public $timestamps=false;
    public $primaryKey= 'id';
    protected $fillable = [
        'name',
        'description',
        'code',
        'group_id',
    ];
}
