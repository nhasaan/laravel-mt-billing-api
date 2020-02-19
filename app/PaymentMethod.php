<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Comment;
// use App\User;

class PaymentMethod extends Model
{
    // define the fillable fields
    protected $fillable = ['title', 'payment_type'];
}
