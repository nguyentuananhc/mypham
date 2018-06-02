<?php

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

Route::get('/', 'HomeController@index');
Route::get('/blog', 'BlogController@index')->name('blog');


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'products', 'middleware' => 'admin.user', 'as' => 'admin.products.'], function () {
        Route::get('/', 'ProductController@index')->name('index');

        Route::get('{langCode}/create/{id?}', 'ProductController@create')->name('create');
        Route::post('{langCode}/create/{id?}', 'ProductController@store')->name('store');

        Route::get('{langCode}/{id}/edit', 'ProductController@edit')->name('edit');
        Route::put('{langCode}/{id}/edit', 'ProductController@update')->name('update');

        Route::delete('/0', 'ProductController@bulkDestroy')->name('bulkDestroy');
        Route::delete('{id}', 'ProductController@destroy')->name('destroy');
    });

    Route::group(['prefix' => 'product-translations', 'middleware' => 'admin.user', 'as' => 'admin.product_translations.'], function () {
        Route::delete('{id}', 'ProductTranslationController@destroy')->name('destroy');
    });
    Voyager::routes();
});
