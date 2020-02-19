<?php

Route::group([
    'namespace' => 'API\Invoice',
    'middleware' => 'api',
    'prefix' => 'v1/invoices'
], function () {
    // Route::get('/', 'TenantController@index');
    // Route::get('/{slug}', 'TenantController@show');

    Route::get('/', function () {
        return App\Invoice::paginate();
    });

    Route::group([
        'middleware' => 'auth:api',
    ], function () {
        // Route::get('/', function () {
        //     return App\Tenant::paginate();
        // });
        
        // Route::get('/', 'TenantController@index');
        Route::get('/{slug}', 'InvoiceController@show');
        Route::post('/mine', 'InvoiceController@filmsMine');
        Route::post('/create', 'InvoiceController@store');
        // Route::post('/{tenant_id}/users', 'UserController@tenant_users');
    });
});
