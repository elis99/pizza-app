<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->group(function () {
    Route::post('user', 'Auth\RegisterController@register');
    Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')
        ->name('verification.verify');
    Route::post('user/login', 'Auth\LoginController@login');

    Route::get('pizza/all', 'PizzaController@all');

    Route::prefix('order')
        ->middleware(['auth:api'])
        ->group(function(){
            Route::post('/', 'OrderController@create');
            Route::get('/', 'OrderController@getAllOfAuthUser');
        });
});

