<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    // define the fillable fields
    protected $fillable = ['tenant_id', 'package_id', 'payment_method_id', 'services', 'created_by_user_id'];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
