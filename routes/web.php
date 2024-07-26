<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContestantController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DanceController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\UnauthorizedController;
use App\Http\Controllers\AccountController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\User;
use App\Http\Middleware\Judge;

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
        Route::resource('/dance', DanceController::class);
        Route::resource('/criteria', CriteriaController::class);
        Route::resource('/score', ScoreController::class);
        Route::resource('account', AccountController::class);
        Route::get('/scores/{contestant}', [ScoreController::class, 'vote'])->name('score.vote');
        Route::get('/contestant-scores/{id}', [ContestantController::class, 'getContestantScores'])->name('contestant.scores');
    });
});

Route::middleware(['auth', User::class])->group(function ()
{
    Route::prefix('user')->name('user.')->group(function() 
    {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::resource('contestant', ContestantController::class)->only(['show']);
        Route::get('/contestant-scores/{id}', [ContestantController::class, 'getContestantScores'])->name('contestant.scores');
    });
});

Route::middleware(['auth', Judge::class])->group(function ()
{
    Route::prefix('judge')->name('judge.')->group(function() 
    {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::resource('/score', ScoreController::class);
        Route::resource('contestant', ContestantController::class)->only(['show']);
        Route::get('/scores/{contestant}', [ScoreController::class, 'vote'])->name('score.vote');
        Route::get('/contestant-scores/{id}', [ContestantController::class, 'getContestantScores'])->name('contestant.scores');
    });
});

