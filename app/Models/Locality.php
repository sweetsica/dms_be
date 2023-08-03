<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    use HasFactory;
    protected $table = 'locality';
    public $timestamps=false;
    public $primaryKey= 'id';
    protected $fillable = [
        'name',
        'description',
        'code',
        'area_id',
    ];
}
