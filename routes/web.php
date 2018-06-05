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

    Route::group(['prefix' => 'posts', 'middleware' => 'admin.user', 'as' => 'admin.posts.'], function () {
        Route::get('/', 'PostController@index')->name('index');

        Route::get('{langCode}/create/{id?}', 'PostController@create')->name('create');
        Route::post('{langCode}/create/{id?}', 'PostController@store')->name('store');

        Route::get('{langCode}/{id}/edit', 'PostController@edit')->name('edit');
        Route::put('{langCode}/{id}/edit', 'PostController@update')->name('update');

        Route::delete('/0', 'PostController@bulkDestroy')->name('bulkDestroy');
        Route::delete('{id}', 'PostController@destroy')->name('destroy');
    });

    Route::group(['prefix' => 'post-translations', 'middleware' => 'admin.user', 'as' => 'admin.post_translations.'], function () {
        Route::delete('{id}', 'PostTranslationController@destroy')->name('destroy');
    });

    Route::group(['prefix' => 'categories', 'middleware' => 'admin.user', 'as' => 'admin.categories.'], function () {
        Route::get('/', 'CategoryController@index')->name('index');

        Route::get('{langCode}/create/{id?}', 'CategoryController@create')->name('create');
        Route::post('{langCode}/create/{id?}', 'CategoryController@store')->name('store');

        Route::get('{langCode}/{id}/edit', 'CategoryController@edit')->name('edit');
        Route::put('{langCode}/{id}/edit', 'CategoryController@update')->name('update');

        Route::delete('/0', 'CategoryController@bulkDestroy')->name('bulkDestroy');
        Route::delete('{id}', 'CategoryController@destroy')->name('destroy');
    });

    Route::group(['prefix' => 'category-translations', 'middleware' => 'admin.user', 'as' => 'admin.category_translations.'], function () {
        Route::delete('{id}', 'CategoryTranslationController@destroy')->name('destroy');
    });
    Voyager::routes();
});
