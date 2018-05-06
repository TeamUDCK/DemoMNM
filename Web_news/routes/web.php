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

Route::get('/', function () {
    //return view('welcome');
    return view('user.index');
});

/**
* ADMIN LOGIN
*/
Route::get('login', 'LoginController@getLogin')->name('getLogin');
Route::post('login', 'LoginController@postLogin')->name('postLogin');

/**
* ADMIN LOGOUT
*/
Route::get('logout', 'LoginController@getLogout');

/**
* 
*/
//Route::get('category/add', 'CateController@CateController')->name('getCateAdd');

/**
* GROUPS MANAGEMENT
*/
Route::group(['middleware' => ['adminMiddleware']], function () {
    Route::get('admin',function(){
    	return view('admin.modules.dashboard.main');
    })->name('admin');

        Route::prefix('admin')->group(function () {

            Route::prefix('category')->group(function () {
                /*Route::get('add', 'CateController@CateController', function () {
                    // Matches The "/admin/users" URL
                    return view('admin.modules.category.cate_add');
                })->name('getCateAdd');*/
                Route::get('add', 'CateController@getCateAdd')->name('getCateAdd');
                Route::post('add', 'CateController@postCateAdd')->name('postCateAdd');
                Route::get('list', 'CateController@getCateList')->name('getCateList');
            });

            Route::get('users', function () {
                // Matches The "/admin/users" URL
            });
        });
});