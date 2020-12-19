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
Route::get('users',                 'UserController@getAll');
Route::post('users',                'UserController@create');

Route::get('users/{id}',            'UserController@get');
Route::delete('users/{id}',         'UserController@delete');