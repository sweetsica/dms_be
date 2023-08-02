<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'routeId',
        'city',
        'district',
        'guide',
        'address',
    ];

    public function route()
    {
        return $this->belongsTo(RouteDirection::class, 'routeId');
    }
}