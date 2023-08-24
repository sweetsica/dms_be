<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WareHouse extends Model
{
    use HasFactory;
    protected $table = 'ware_houses';
    public $timestamps=false;
    public $primaryKey= 'id';
    protected $fillable = [
        'code',
        'name',
        'classify',
        'description',
        'address',
        'manage',
        'accountant',
        'status',        
    ];
}
