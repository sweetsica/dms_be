<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Custom extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'customs';
    protected $fillable = [
        'code',
        'name',
        'version_ids',
        'note',
        'created_at',
        'deleted_at',
    ];

    public function versions()
    {
        return $this->hasMany(Version::class, 'id', 'version_ids');
    }
}
