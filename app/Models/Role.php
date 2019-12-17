<?php

namespace App\Models;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Role extends BaseModel
{
    protected $fillable = [
        'name','created_by','modified_by','is_delete'
    ];
    public function user()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
