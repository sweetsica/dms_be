<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $table = 'position';
    public $timestamps=false;
    public $primaryKey= 'id';
    protected $fillable = [
        'name',
        'description',
        'parent',
        'code',
        'staffing',
        'wage',
        'pack',
        'personnel_level',
        'department_id',
    ];

    public function donViMe()
    {
        return $this->belongsTo(Position::class, 'parent');
    }

    public function donViCon()
    {
        return $this->hasMany(Position::class, 'parent');
    }

    public static  function recursive($position, $parents = 0,$level = 1, &$positionlists){
        if(count($position)>0){
            foreach($position as $key =>$value){
                if($value->parent == $parents){
                    $value->level = $level;
                    $positionlists[]= $value;
                    unset($position[$key]);
                    $parent = $value->id;
                    self::recursive($position,$parent,$level+1,$positionlists);
                }
            }
        }
    }
}
