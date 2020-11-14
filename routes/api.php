<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/', [NoteController::class, 'index']);
Route::post('/', [NoteController::class, 'store']);
Route::put('/{id}', [NoteController::class, 'update']);
Route::get('/{id}', [NoteController::class, 'show']);
Route::delete('/{id}', [NoteController::class, 'destroy']);
