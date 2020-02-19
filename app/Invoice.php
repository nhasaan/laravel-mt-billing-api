<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    // define the fillable fields
    protected $fillable = ['user_id', 'tenant_id', 'microservice_id', 'package_id', 'title', 'payment_status', 'month_invoice', 'year_invoice', 'microservice_title', 'tenant_name', 'user_name', 'package_title', 'package_billing_period', 'package_price'];
}
