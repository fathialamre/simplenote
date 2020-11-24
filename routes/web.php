<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\AuthController;
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
Route::get('login', [AuthController::class, 'index']);
Route::post('login', [AuthController::class , 'authenticate'])->name('login');
Route::post('logout', 'AuthController@logout')->name('user-logout');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/home',  [HomeController::class, 'index'])->name('home');
    Route::resource('ads', AdController::class);
});

Route::get('/flowers', function (){
    return view('under-work');
})->name('flowers');
Route::get('/seen', function (){
    return view('under-work');
})->name('seen');
