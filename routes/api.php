<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::prefix('notes')->group(function() {
    Route::get('/', [NoteController::class, 'index']);
    Route::post('/add', [NoteController::class, 'store']);
    Route::put('/update/{id}', [NoteController::class, 'update']);
    Route::get('/show/{id}', [NoteController::class, 'show']);
    Route::delete('/delete/{id}', [NoteController::class, 'destroy']);
});
