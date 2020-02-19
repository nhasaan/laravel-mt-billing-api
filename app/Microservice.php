<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Comment;
// use App\User;

class Microservice extends Model
{
    // define the fillable fields
    protected $fillable = ['title', 'type'];
}
