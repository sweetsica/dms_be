<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerGroup extends Model
{
    use HasFactory;
    protected $table ='customer_group';
    public $timestamps = false;
    public $primaryKey ='id';
    protected $fillable = [
            'name',
            'code',
            'description',
    ];

}
