<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
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

Route::get('/', [Controller::class, 'index']);


Route::post('/login', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'createLogin'])->name('login');
Route::get('search/{search}',[Controller::class, 'search'] )->name("event.search");

Route::group(['middleware'=>['auth'], 'prefix'=>'admin'],(function(){
    Route::get('/', function(){
        return view('dashboard.home');
    })->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/events', [EventController::class, 'index'])->name('event.list');
    Route::get('/events/new', [EventController::class, 'create'])->name('event.create');
    Route::post('/events/new', [EventController::class, 'store'])->name('event.store');
    Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('event.edit');
    Route::put('/events/{id}/edit', [EventController::class, 'update'])->name('event.update');
    Route::get('/events/{id}/delete', [EventController::class, 'destroy'])->name('event.delete');
    // Route::get('/events/{search}', [EventController::class, 'search'])->name('event.search');
    // Route::resource('dashboard/events',EventController::class);
}));