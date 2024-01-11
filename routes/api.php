<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources(
    [
        'users' => App\Http\Controllers\UserController::class,
    ]
);
Route::post('/login', [App\Http\Controllers\LoginController::class, 'login'] )->name('login');
Route::post('/logout', [App\Http\Controllers\UserController::class, 'logout']);
Route::get('getGroups', [\App\Http\Controllers\GroupController::class, 'getGroups']);
Route::post('add-group', [\App\Http\Controllers\GroupController::class, 'addGroup']);

Route::group([
    'middleware' => [
        'auth:sanctum',
        //'role:super-admin'
    ]
], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/getUser', [App\Http\Controllers\UserController::class, 'getUser']);

});
