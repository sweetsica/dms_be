<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;

    protected $table = 'personnel';
    public $timestamps=false;
    public $primaryKey= 'id';
    protected $fillable = [
        'name',
        'description',
        'code',
        'department_id',
        'position_id',
        'personnel_lv_id',
        'area_id',
        'email',
        'role_id',
        'phone',
        'form',
        'states',
        'manage',
    ];

    public function donViMe()
    {
        return $this->belongsTo(Personnel::class, 'manage');
    }

    public function donViCon()
    {
        return $this->hasMany(Personnel::class, 'manage');
    }

    public static  function recursive($personnel, $manages = 0,$level = 1, &$personnellists){
        if(count($personnel)>0){
            foreach($personnel as $key =>$value){
                if($value->manage == $manages){
                    $value->level = $level;
                    $personnellists[]= $value;
                    unset($personnel[$key]);
                    $manage = $value->id;
                    self::recursive($personnel,$manage,$level+1,$personnellists);
                }
            }
        }
    }

}
