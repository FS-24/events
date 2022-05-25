<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
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
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard.home');
});

Route::post('/login', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'createLogin'])->name('login');

Route::middleware('auth')->group(function(){
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::resource('dashboard/events',EventController::class);
});