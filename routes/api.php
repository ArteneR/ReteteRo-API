<?php

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


// Auth:
Route::get('auth/user-profile',     'AuthController@userProfile');
Route::post('auth/login',           'AuthController@login');
Route::post('auth/register',        'AuthController@register');
Route::post('auth/refresh-token',   'AuthController@refreshToken');
Route::post('auth/logout',          'AuthController@logout');


// Users:
Route::get('users',                 'UserController@index');
Route::get('users/{id}',            'UserController@show');
Route::post('users',                'UserController@store');
Route::delete('users/{id}',         'UserController@delete');