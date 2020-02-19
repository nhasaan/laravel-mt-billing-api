<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Comment;
// use App\User;

class Client extends Model
{
    // define the fillable fields
    protected $fillable = ['name', 'contact_email', 'tenant_id', 'created_by_user_id'];

    public function tenant()
    {
        return $this->belongsTo('App\Tenant');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'created_by_user_id');
    }
}
