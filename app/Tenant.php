<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Comment;
// use App\User;

class Tenant extends Model
{
    // define the fillable fields
    protected $fillable = ['name', 'domain', 'description'];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
