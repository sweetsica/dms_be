<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'department';
    public $timestamps=false;
    public $primaryKey= 'id';
    protected $fillable = [
        'code',
        'name',
        'description',
        'parent',
        'ib_lead',
    ];


    public function donViMe()
    {
        return $this->belongsTo(Department::class, 'parent');
    }

    public function donViCon()
    {
        return $this->hasMany(Department::class, 'parent');
    }

    public function khuVucs()
{
    return $this->hasMany(Area::class, 'area');
}



    public static  function recursive($department, $parents = 0,$level = 1, &$departmentlists){
        if(count($department)>0){
            foreach($department as $key =>$value){
                if($value->parent == $parents){
                    $value->level = $level;
                    $departmentlists[]= $value;
                    unset($department[$key]);
                    $parent = $value->id;
                    self::recursive($department,$parent,$level+1,$departmentlists);
                }
            }
        }
    }
}
