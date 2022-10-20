<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogCategoryController;

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
Route::get('/users',[App\Http\Controllers\Admin\UserContoller::class,'index'])->name('index');
Route::get('/users/create',[App\Http\Controllers\Admin\UserContoller::class,'create'])->name('userCreate');
Route::post('/users/store',[App\Http\Controllers\Admin\UserContoller::class,'store'])->name('userStore');
Route::get('/users/edit/{userid}',[App\Http\Controllers\Admin\UserContoller::class,'edit'])->name('userEdit');
Route::post('/users/update',[App\Http\Controllers\Admin\UserContoller::class,'update'])->name('userUpdate');
Route::delete('/users/delete/{id}',[App\Http\Controllers\Admin\UserContoller::class,'userdelete'])->name('userDelete');

//BlogCategory

Route::resource('blogCategories', App\Http\Controllers\Admin\BlogCategoryController::class);
// Route::get('blogCategories/restore',[BlogCategoryContoller::class,'restore'])->name('blogCategories.restore');

//Blog
Route::resource('blogs', App\Http\Controllers\Admin\BlogController::class);