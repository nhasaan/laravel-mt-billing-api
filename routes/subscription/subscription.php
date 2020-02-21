<?php

Route::group([
    'namespace' => 'API\Subscription',
    'middleware' => 'api',
    'prefix' => 'v1/subscriptions'
], function () {
    // Route::get('/', 'TenantController@index');
    // Route::get('/{slug}', 'TenantController@show');

    Route::group([
        'middleware' => 'auth:api',
    ], function () {
        // Route::get('/', function () {
        //     return App\Tenant::paginate();
        // });
        
        // Route::get('/', 'TenantController@index');
        Route::post('/subscribe', 'SubscriptionController@subscribe');
    });
});
