<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;

Route::get('/homepage', [HomepageController::class, 'index'])->name('homepage');
Route::resource("articles", ArticleController::class);
