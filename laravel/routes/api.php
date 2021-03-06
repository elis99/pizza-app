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
    Route::post('user/login', 'Auth\LoginController@login');
    Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')
        ->name('verification.verify');

    Route::get('pizza/all', 'PizzaController@all');

    Route::middleware(['auth:api'])->group(function(){
        Route::prefix('order')
            ->group(function(){
                Route::post('/', 'OrderController@create');
                Route::get('/', 'OrderController@getAllOfAuthUser');
                Route::post('/calc', 'OrderController@calcPreOrderPrice');
            });
        Route::delete('/user/logout', 'Auth\LogoutController@logout');
    });


});

