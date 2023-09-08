<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;
    protected $table = 'purchase_orders';
    public $primaryKey= 'id';
    protected $fillable = [
        'group_id',
        'order_staff',
        'route_direction',
        'customer_id',
        'description',
        'data',
        'status',
        'code',
        'total_money',
        'edit_order'
    ];

    public function orderStaff()
    {
        return $this->belongsTo(Personnel::class, 'order_staff');
    }

    public function editStaff()
    {
        return $this->belongsTo(Personnel::class, 'edit_order');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function routeDirection()
    {
        return $this->belongsTo(RouteDirection::class, 'route_direction');
    }
    public function group()
    {
        return $this->belongsTo(Department::class, 'group_id');
    }
}
