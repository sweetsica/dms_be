<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'products';
    protected $fillable = [
        'code',
        'name',
        'thumbnail',
        'type',
        'branch',
        'status',
        'created_at',
        'deleted_at',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'productId');
    }
}
