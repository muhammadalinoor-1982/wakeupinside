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

Route::resource ('crud111', 'crud111Controller');
Route::post ('crud111/{id}/restore', 'crud111Controller@restore')->name('crud111.restore');
Route::delete ('crud111/{id}/delete', 'crud111Controller@delete')->name('crud111.delete');
Route::resource ('crud222', 'crud222Controller');
Route::post ('crud222/{id}/restore', 'crud222Controller@restore')->name('crud222.restore');
Route::delete ('crud222/{id}/delete', 'crud222Controller@delete')->name('crud222.delete');

