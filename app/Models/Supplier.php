<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'suppliers';
    public $timestamps=false;
    public $primaryKey= 'id';
    protected $fillable = [
        'name',
        'code',
        'business_areas',
        'tax_code',
        'representative',
        'job_title',
        'bank_number',
        'bank_name',
        'address',
        'contact_name',
        'contact_phone',
        'contact_email',
        'debt_limit',
        'days_owed',
        'status',
    ];
}
