<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'versions';
    protected $fillable = [
        'code',
        'name',
        'product_ids',
        'note',
        'created_at',
        'deleted_at',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'id', 'product_ids');
    }
}
