<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;

    protected $table = 'personnel';
    public $timestamps=false;
    public $primaryKey= 'id';
    protected $fillable = [
        'name',
        'description',
        'code',
        'department_id',
        'position_id',
        'personnel_lv_id',
        'area_id',
        'email',
        'phone',
        'form',
        'states',
    ];

}
