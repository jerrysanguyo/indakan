<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContestantController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UnauthorizedController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\User;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/Unauthorized-access', [UnauthorizedController::class, 'index'])->name('unauthorized-access');

Route::middleware(['auth', Admin::class])->group(function () 
{
    Route::prefix('admin')->name('admin.')->group(function () 
    {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::resource('/contestant', ContestantController::class);
        Route::resource('/category', CategoryController::class);
    });
});

Route::middleware(['auth', User::class])->group(function ()
{
    Route::prefix('user')->name('user.')->group(function() 
    {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
    });
});

