<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteDirection extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'route_directions';
    protected $fillable = [
        'name',
        'code',
        'personId',
        'travel_time',
        'areaId',
        'description',
    ];

    public function personnel()
    {
        return $this->belongsTo(Personnel::class, 'personId');
    }
    
    public function areas()
    {
        return $this->belongsTo(Area::class, 'areaId');
    }
}