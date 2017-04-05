<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', ['as' => 'admin.login', 'uses' => 'AuthController@login']);
    Route::post('/doLogin', ['as' => 'admin.doLogin', 'uses' => 'AuthController@doLogin']);
    Route::get('/logout', ['as' => 'admin.logout', 'uses' => 'AuthController@logout']);

    Route::group(['middleware' => ['auth', 'authorize']], function () {
        Route::get('/', ['as' => 'admin.index', 'uses' => 'PagesController@index']);

        Route::group(['prefix' => 'admin'], function () {
            Route::group(['prefix' => 'adminUser'], function () {
                Route::get('/', ['as' => 'admin.adminUser.index', 'uses' => 'AdminUserController@index']);
                Route::get('/create', ['as' => 'admin.adminUser.create', 'uses' => 'AdminUserController@create']);
                Route::get('/{id}/edit', ['as' => 'admin.adminUser.edit', 'uses' => 'AdminUserController@edit']);
                Route::post('/store', ['as' => 'admin.adminUser.store', 'uses' => 'AdminUserController@store']);
                Route::post('/update', ['as' => 'admin.adminUser.update', 'uses' => 'AdminUserController@update']);
                Route::post('/destroy', ['as' => 'admin.adminUser.destroy', 'uses' => 'AdminUserController@destroy']);
            });
            Route::group(['prefix' => 'role'], function () {
                Route::get('/', ['as' => 'admin.role.index', 'uses' => 'RoleController@index']);
                Route::get('/create', ['as' => 'admin.role.create', 'uses' => 'RoleController@create']);
                Route::get('/{id}/edit', ['as' => 'admin.role.edit', 'uses' => 'RoleController@edit']);
                Route::post('/store', ['as' => 'admin.role.store', 'uses' => 'RoleController@store']);
                Route::post('/update', ['as' => 'admin.role.update', 'uses' => 'RoleController@update']);
                Route::post('/destroy', ['as' => 'admin.role.destroy', 'uses' => 'RoleController@destroy']);
            });
            
            Route::group(['prefix' => 'menu'], function () {
                Route::get('/', ['as' => 'admin.menu.index', 'uses' => 'MenuController@index']);
                Route::get('/create', ['as' => 'admin.menu.create', 'uses' => 'MenuController@create']);
                Route::get('/{id}/edit', ['as' => 'admin.menu.edit', 'uses' => 'MenuController@edit']);
                Route::post('/store', ['as' => 'admin.menu.store', 'uses' => 'MenuController@store']);
                Route::post('/update', ['as' => 'admin.menu.update', 'uses' => 'MenuController@update']);
                Route::post('/destroy', ['as' => 'admin.menu.destroy', 'uses' => 'MenuController@destroy']);
                Route::post('/ajaxUpdateSortParent', ['as' => 'admin.menu.ajaxUpdateSortParent', 'uses' => 'MenuController@ajaxUpdateSortParent']);
            });
        });
    });

});

