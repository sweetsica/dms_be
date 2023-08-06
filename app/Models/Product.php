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
        'type',
        'branch',
        'created_by',
        'status',
        'created_at',
        'deleted_at',
    ];

    public function creators()
    {
        return $this->belongsTo(Personnel::class, 'created_by');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'productId');
    }
}
