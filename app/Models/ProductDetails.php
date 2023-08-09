<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'product_details';
    protected $fillable = [
        'product_id',
        'images',
        'description',
        'price',
        'attachments',
        'data',
        'related',
    ];
    
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
