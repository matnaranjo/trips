<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\lwcontroller;

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

Route::get('/', [lwcontroller::class, 'login'])->name('login');
Route::get('register', [lwcontroller::class, 'register'])->name('register');
Route::get('private', [lwcontroller::class, 'private'])->middleware('auth')->name('privateSec');
Route::get('test', [lwcontroller::class,'test'])->name('test');
Route::get('logout',[lwcontroller::class, 'logoutUser'])->name('logout');
Route::get('addEntry', [lwcontroller::class, 'addEntry'])->middleware('auth')->name('addEntry');
Route::get('searchEntry', [lwcontroller::class, 'searchEntry'])->middleware('auth')->name('seachEntry');

Route::post('validate',[lwcontroller::class, 'registerUser'])->name('validate');
Route::post('loginuser', [lwcontroller::class, 'loginUser'])->name('loginuser');
Route::post('addtrip',[lwcontroller::class, 'addtrip'])->name('addtrip');
