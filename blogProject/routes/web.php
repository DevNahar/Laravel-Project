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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[App\Http\Controllers\Admin\MasterController::class,'dashboard']);
Route::get('/users',[App\Http\Controllers\Admin\UserContoller::class,'userlist'])->name('userlist');
Route::get('/users/create',[App\Http\Controllers\Admin\UserContoller::class,'create'])->name('userCreate');
Route::post('/users/store',[App\Http\Controllers\Admin\UserContoller::class,'store'])->name('userStore');
