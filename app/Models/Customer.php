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
    // protected $guarded = [''];
   protected $fillable = [
       'code',
       'name',
       'type',
       'class',
       'phone',
       'email',
       'personCompany',
       'category',
       'zalo',
       'note',
       'website',
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
       'group',
       'chanelId',
       'status',
       'coordinatesX',
       'coordinatesY',
       'filePath',
       'fileName',
       'comment',
       'author',
       'image',
       'timeComment',
       'customer_type',
   ];

    public function route()
    {
        return $this->belongsTo(RouteDirection::class, 'routeId');
    }

    public function products()
    {
        $productIds = json_decode($this->productId) ?? [];

        return Product::whereIn('id', $productIds)->get();
    }

    public function person()
    {
        return $this->belongsTo(Personnel::class, 'personId');
    }

    public function channel()
    {
        return $this->belongsTo(Department::class, 'chanelId');
    }

    public function group_customer()
    {
        return $this->belongsTo(CustomerGroup::class, 'group');
    }

//     public function promotions()
// {
//     return $this->belongsToMany(Promotion::class, 'customer_group_id', 'customer_id', 'promotion_id');
// }
}
