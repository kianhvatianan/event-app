<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EventController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminController::class, 'login']);
    Route::post('logout', [AdminController::class, 'logout'])->middleware('admin')->name('logout');
    Route::middleware('admin')->get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Event management
    Route::get('event', [EventController::class, 'index'])->name('events.index');
    Route::get('event/create', [EventController::class, 'create'])->name('events.create');
    Route::post('event', [EventController::class, 'store'])->name('events.store');
    Route::get('event/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('event/{event}', [EventController::class, 'update'])->name('events.update');
    Route::get('event/{id}', [EventController::class, 'show'])->name('events.show');
    Route::delete('event/{event}', [EventController::class, 'destroy'])->name('events.destroy');
});
