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
    protected $fillable = [
        'code',
        'name',
        'department_id',
        'position_id',
        'position_level_id',
        'role_id',
        'area_id',
        'email',
        'phone',
        'working_form',
        'status',
        'password',
        'birthday',
        'address',
        'gender',
        'annual_salary',
        'pack',
        'manage'
    ];
    public function donViMe()
    {
        return $this->belongsTo(Personnel::class, 'manage');
    }

    public function donViCon()
    {
        return $this->hasMany(Personnel::class, 'manage');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    // public function position()
    // {
    //     return $this->belongsTo(Position::class, 'position_id');
    // }

    public function level()
    {
        return $this->belongsTo(PersonnelLevel::class, 'position_level_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
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

    public function hasPermission($permission)
{
    // Kiểm tra xem người dùng có quyền $permission không
    return $this->permissions->contains('name', $permission);
}




}
