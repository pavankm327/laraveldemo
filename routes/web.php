<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'UserController@index')->name('user.index');
Route::get('/register', 'UserController@create')->name('user.create');
Route::post('/store', 'UserController@store')->name('user.store');
Route::post('/login', 'UserController@login')->name('user.login');
Route::get('logout', 'UserController@logout')->name('user.logout');

Route::get('dashboard', 'UserController@dashboard')->name('userDashboard')->middleware('auth');
Route::delete('user/{id}','UserController@destroy')->name('user.destroy');

