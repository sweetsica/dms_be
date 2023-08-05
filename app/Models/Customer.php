<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'customers';
    protected $fillable = [
        'code',
        'name',
        'phone',
        'MST',
        'email',
        'point_name',
        'point_nickname',
        'point_phone',
        'point_email',
        'incharge_id',
        'group',
        'channel',

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

    public function incharges()
    {
        return $this->belongsTo(Personnel::class, 'incharge_id');
    }
}
