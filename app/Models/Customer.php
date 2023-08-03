<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        // 'code',
        'name',
        'phone',
        'email',
        'routeId',
        'city',
        'district',
        'guide',
        'address',
        'personContact',
        'personName',
        'personPhoneNumber',
        'personEmail',
        'hrManager',
        'type',
        'customerChanel'
    ];

    public function route()
    {
        return $this->belongsTo(RouteDirection::class, 'routeId');
    }
}