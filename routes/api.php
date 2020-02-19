<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

require __DIR__ . '/auth/auth.php';
require __DIR__ . '/user/user.php';
require __DIR__ . '/auth/passwordReset.php';
require __DIR__ . '/tenant/tenant.php';
require __DIR__ . '/microservice/microservice.php';
require __DIR__ . '/package/package.php';
require __DIR__ . '/invoice/invoice.php';
require __DIR__ . '/role/role.php';
require __DIR__ . '/client/client.php';
