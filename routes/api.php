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
Route::post('auth/register',        'AuthController@register');
Route::post('auth/login',           'AuthController@login');
Route::post('auth/logout',          'AuthController@logout');
Route::post('auth/refresh-token',   'AuthController@refreshToken');

Route::get('auth/user-profile',     'AuthController@getUserProfile');
Route::put('auth/user-profile',     'AuthController@updateUserProfile');
Route::delete('auth/user-profile',  'AuthController@deleteUserProfile');


// Users:
Route::get('users',                 'UserController@getAll');
Route::get('users/{id}',            'UserController@get');


// Recipes:
Route::get('recipes',               'RecipeController@getAll');
Route::get('recipes/{id}',          'RecipeController@get');
Route::post('recipes',              'RecipeController@create');
Route::put('recipes/{id}',          'RecipeController@update');
Route::delete('recipes/{id}',       'RecipeController@delete');