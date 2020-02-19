<?php

Route::group([
    'namespace' => 'API\Microservice',
    'middleware' => 'api',
    'prefix' => 'v1/microservices'
], function () {
    // Route::get('/', 'TenantController@index');
    // Route::get('/{slug}', 'TenantController@show');

    Route::get('/', function () {
        return App\Microservice::paginate();
    });

    Route::group([
        'middleware' => 'auth:api',
    ], function () {
        // Route::get('/', function () {
        //     return App\Tenant::paginate();
        // });
        
        // Route::get('/', 'TenantController@index');
        Route::get('/{slug}', 'MicroserviceController@show');
        Route::post('/mine', 'MicroserviceController@filmsMine');
        Route::post('/create', 'MicroserviceController@store');
        // Route::post('/{tenant_id}/users', 'UserController@tenant_users');
    });
});
