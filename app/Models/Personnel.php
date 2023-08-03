<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    use HasFactory;
    public $timestamps = false;
    protected $table = 'personnel';
    public $primaryKey= 'id';
    protected $fillable = [
        'name',
        'email',
        'password',
        'code',
        'role_id',
        'phone',
        'working_form',
        'address',
        'status',
        'department_id',
        'position_id',
        'position_level_id',
        'area_id',
        'email',
        'phone',
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
