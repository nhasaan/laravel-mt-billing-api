<?php

Route::group([
    'namespace' => 'User',
    'middleware' => 'api',
    'prefix' => 'v1/users'
], function () {
    // Route::get('/', 'TenantController@index');
    // Route::get('/{slug}', 'TenantController@show');

    Route::get('/', function () {
        return App\User::paginate();
    });

    Route::group([
        'middleware' => 'auth:api',
    ], function () {
        // Route::get('/', function () {
        //     return App\Tenant::paginate();
        // });
        
        // Route::get('/', 'TenantController@index');
        Route::get('/{slug}', 'UserController@show');
        Route::post('/mine', 'UserController@filmsMine');
        Route::post('/create', 'UserController@store');
        // Route::post('/{tenant_id}/users', 'UserController@tenant_users');
    });
});
