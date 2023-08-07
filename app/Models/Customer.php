<?php

namespace App\Models;

use Illuminate\Broadcasting\Channel;
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
        'email',
        'personContact',
        'companyName',
        'career',
        'taxCode',
        'companyPhoneNumber',
        'companyEmail',
        'accountNumber',
        'bankOpen',
        'city',
        'district',
        'guide',
        'address',
        'personId',
        'productId',
        'routeId',
        'groupId',
        'chanelId',
        'status',
    ];

    public function route()
    {
        return $this->belongsTo(RouteDirection::class, 'routeId');
    }

    public function favoriteProducts()
    {
        return $this->hasMany(Product::class, 'productId');
    }

    public function person()
    {
        return $this->belongsTo(Personnel::class, 'personId');
    }

    public function channel()
    {
        return $this->belongsTo(Department::class, 'chanelId');
    }
}