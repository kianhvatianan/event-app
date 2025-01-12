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

use App\Http\Controllers\Member\MemberAuthController;
use App\Http\Controllers\Member\MemberEventController;

Route::prefix('member')->name('member.')->group(function () {
    Route::get('register', [MemberAuthController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [MemberAuthController::class, 'register']);
    Route::get('login', [MemberAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [MemberAuthController::class, 'login']);
    Route::post('logout', [MemberAuthController::class, 'logout'])->name('logout');
    Route::middleware('member')->get('dashboard', [MemberEventController::class, 'dashboard'])->name('dashboard');

});


use App\Http\Controllers\Public\PublicEventController;

Route::get('/', [PublicEventController::class, 'index'])->name('public.events.index');
Route::get('{id}', [PublicEventController::class, 'show'])->name('public.events.show');
Route::post('events/{event}/register', [PublicEventController::class, 'registerForEvent'])->name('public.events.register');