<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Comment;
// use App\User;

class Role extends Model
{
    // define the fillable fields
    protected $fillable = ['level', 'rolename'];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
