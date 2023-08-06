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
        'name',
        'phone',
        'email',
        'personContact',
        'comanyName',
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
}