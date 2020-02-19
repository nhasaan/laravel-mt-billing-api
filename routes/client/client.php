<?php

Route::group([
    'namespace' => 'API\Client',
    'middleware' => 'api',
    'prefix' => 'v1/clients'
], function () {

    Route::get('/', function () {
        return App\Client::paginate();
    });
    // Route::get('/', 'TenantController@index');
    // Route::get('/{slug}', 'TenantController@show');
    Route::group([
        'middleware' => 'auth:api',
    ], function () {
    
        // Route::get('/', 'ClientController@index');
        
        // Route::get('/', 'TenantController@index');
        Route::get('/{id}', 'ClientController@show');
        Route::post('/mine', 'ClientController@filmsMine');
        Route::post('/create', 'ClientController@store');
        // Route::post('/{tenant_id}/users', 'UserController@tenant_users');
    });
});
