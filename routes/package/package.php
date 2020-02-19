<?php

Route::group([
    'namespace' => 'API\Package',
    'middleware' => 'api',
    'prefix' => 'v1/packages'
], function () {
    // Route::get('/', 'TenantController@index');
    // Route::get('/{slug}', 'TenantController@show');

    Route::get('/', function () {
        return App\Package::paginate();
    });

    Route::group([
        'middleware' => 'auth:api',
    ], function () {
        // Route::get('/', function () {
        //     return App\Tenant::paginate();
        // });
        
        // Route::get('/', 'TenantController@index');
        Route::get('/{slug}', 'PackageController@show');
        Route::post('/mine', 'PackageController@filmsMine');
        Route::post('/create', 'PackageController@store');
        // Route::post('/{tenant_id}/users', 'UserController@tenant_users');
    });
});
