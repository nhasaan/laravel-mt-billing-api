<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Multitenantable {

    protected static function bootMultitenantable()
    {
        if (auth()->check()) {
            static::creating(function ($model) {
                $model->created_by_user_id = auth()->id();
                $model->tenant_id = auth()->tenant_id();
            });
            if (auth()->user()->role_id != 1) {
                static::addGlobalScope('tenant_id', function (Builder $builder) {
                    $builder->where('tenant_id', auth()->tenant_id());
                });
                static::addGlobalScope('created_by_user_id', function (Builder $builder) {
                    $builder->where('created_by_user_id', auth()->id());
                });
            }
        }
    }

}