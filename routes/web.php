<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
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

Route::group(['prefix' => '/'], function () {
    Route::get('/', [QuizController::class, 'index']);
    Route::get('/solve', [QuizController::class, 'solve']);
    Route::post('/calculate',[QuizController::class,'getData']);
});
