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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('Admin/dashboard', 'HomeController@admin_dashboard')->name('admin_dashboard')->middleware('checkrole');


Route::post('add-category','CategoryController@create')->name('add_category');
route::delete('delete/{id}/{pid}', 'CategoryController@destroy')->name('delete_category');
Route::delete('sub_category_delete/{id}', 'CategoryController@destroyd_sub_cat')->name('delete_sub_category');

Route::get('/edit_cat/{id}', 'CategoryController@edit')->name('edit_cat');
Route::put('/update_cat/{category}', 'CategoryController@update')->name('update_category');