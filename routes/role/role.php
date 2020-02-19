<?php

Route::group([
    'namespace' => 'Role',
    'middleware' => 'api',
    'prefix' => 'v1/roles'
], function () {
    // Route::get('/', 'TenantController@index');
    // Route::get('/{slug}', 'TenantController@show');

    Route::get('/', function () {
        return App\Role::paginate();
    });

    Route::group([
        'middleware' => 'auth:api',
    ], function () {
        // Route::get('/', function () {
        //     return App\Tenant::paginate();
        // });
        
        // Route::get('/', 'TenantController@index');
        Route::get('/{id}', 'RoleController@show');
        Route::post('/mine', 'RoleController@filmsMine');
        Route::post('/create', 'RoleController@store');
        // Route::post('/{tenant_id}/users', 'UserController@tenant_users');
    });
});
