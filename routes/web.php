<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\HomeController;
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

Route::get('/',[HomeController::class,'index'])->middleware('guest')->name('home');
Route::post('/user/login',[HomeController::class,'login'])->name('user.login')->middleware('guest');

Route::get('/user/dashboard',[HomeController::class,'dashboard'])->name('user.dashboard')->middleware('auth');
Route::post('/logout',[HomeController::class,'logout'])->name('logout')->middleware('auth');
Route::get('/add/data',[DataController::class,'index'])->name('add.data')->middleware('auth');
Route::get('/get-districts',[DataController::class,'get_districts'])->middleware('auth');
Route::get('/get-sub-districts',[DataController::class,'get_sub_districts'])->middleware('auth');
Route::post('/add-user-collection-data',[DataController::class,'add_data'])->name('data.add')->middleware('auth');
Route::get('/edit_collection_data',[DataController::class,'edit_collection_data'])->middleware('auth');
Route::post('/store_collection_data',[DataController::class,'store_data'])->name('store.data')->middleware('auth');
Route::get('/emulate-data-list',[DataController::class,'emulate_data'])->name('emulate.data')->middleware('auth');


