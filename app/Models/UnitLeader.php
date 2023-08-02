<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitLeader extends Model
{
    use HasFactory;
    protected $table = 'unit_leader';
    public $timestamps=false;
    public $primaryKey= 'id';
    protected $fillable = [
        'name',
    ];
}
