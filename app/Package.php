<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Comment;
// use App\User;

class Package extends Model
{

    // define the fillable fields
    protected $fillable = ['title', 'billing_type', 'price'];
}
