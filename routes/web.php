<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group([
    'prefix' => 'categories'
], function(){
    Route::get('/', 'CategoryController@index')->name('categories.index');
    Route::get('/create', 'CategoryController@create')->name('categories.create');
    Route::post('/store', 'CategoryController@store')->name('categories.store');
    Route::get('/{id}/edit', 'CategoryController@edit')->name('categories.edit');
    Route::put('/{id}/update', 'CategoryController@update')->name('categories.update');
    Route::delete('/{id}/delete', 'CategoryController@delete')->name('categories.delete');
});

Route::group([
    'prefix' => 'post'
], function(){
    Route::get('/', 'PostController@index')->name('post.index');
    Route::get('/create', 'PostController@create')->name('post.create');
    Route::post('/store', 'PostController@store')->name('post.store');
    
    Route::group([
        'middleware' => 'admin_role',
    ], function(){
        Route::get('/{id}/edit', 'PostController@edit')->name('post.edit');
        Route::put('/{id}/update', 'PostController@update')->name('post.update');
        Route::delete('/{id}/delete', 'PostController@delete')->name('post.delete');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
