<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $table = 'area';
    public $timestamps=false;
    public $primaryKey= 'id';
    protected $fillable = [
        'name',
        'description',
        'parent',
        'id_lead',
    ];

    public function donViMe()
    {
        return $this->belongsTo(Area::class, 'parent');
    }

    public function donViCon()
    {
        return $this->hasMany(Area::class, 'parent');
    }


    public static  function recursive($area, $parents = 0,$level = 1, &$areaLists){
        if(count($area)>0){
            foreach($area as $key =>$value){
                if($value->parent == $parents){
                    $value->level = $level;
                    $areaLists[]= $value;
                    unset($area[$key]);
                    $parent = $value->id;
                    self::recursive($area,$parent,$level+1,$areaLists);
                }
            }
        }
    }

}
