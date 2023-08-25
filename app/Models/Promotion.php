<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $table = 'promotion';
    public $timestamps=false;
    public $primaryKey= 'id';
    protected $fillable = [
        'name',
        'promotion_form',
        'code',
        'applicable_date',
        'end_date',
        'multiples',
        'status',
        'customer_group_id',
        'customer_type',
        'customer_id',
        'promotion_details'
    ];

//     public function customers()
// {
//     return $this->belongsToMany(Customer::class, 'customer_group_id', 'id');
// }



}
