<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteDirection extends Model
{
    use HasFactory;
    protected $table = 'routeDirections';
    protected $fillable = [
        'name',
        'code',
        'personId',
        // 'timeTravel',
        'areaId',
        'description',
    ];

    public function customers()
    {
        return $this->hasMany(Customer::class, 'routeId');
    }
}