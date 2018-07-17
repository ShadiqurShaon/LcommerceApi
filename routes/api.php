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

Route::post('user/register', 'APIRegisterController@register');
Route::post('user/login', 'APILoginController@login');

Route::middleware('jwt.auth')->group(function(){

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('user/update','ProfileController@update');
    Route::get('user/profile','ProfileController@index');

    //Articles
    Route::post('article','ArticleController@store');
    Route::put('article/{id}','ArticleController@update');
    Route::get('article','ArticleController@index');
    Route::get('article/{id}','ArticleController@show');
    Route::delete('article/{id}','ArticleController@delete');

    //productcategory
    Route::get('productcategory','ProductCategoryController@index');
    //Product
    Route::post('product/{category}','ProductController@store');
    Route::get('product/{category}','ProductController@index');
    Route::post('product/{id}','ProductController@update');




});

