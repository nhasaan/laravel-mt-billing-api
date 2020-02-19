<?php

Route::group([
    'namespace' => 'API\Tenant',
    'middleware' => 'api',
    'prefix' => 'v1/tenants'
], function () {
    // Route::get('/', 'TenantController@index');
    // Route::get('/{slug}', 'TenantController@show');

    Route::get('/', function () {
        return App\Tenant::paginate();
    });

    Route::group([
        'middleware' => 'auth:api',
    ], function () {
        // Route::get('/', function () {
        //     return App\Tenant::paginate();
        // });
        
        // Route::get('/', 'TenantController@index');
        Route::get('/{slug}', 'TenantController@show');
        Route::post('/mine', 'TenantController@filmsMine');
        Route::post('/create', 'TenantController@store');
        // Route::post('/{tenant_id}/users', 'UserController@tenant_users');
    });
});
