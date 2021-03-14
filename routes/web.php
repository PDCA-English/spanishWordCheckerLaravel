<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\FinishController;



Route::get('/', [IndexController::class, 'index']);
Route::post('/quiz', [IndexController::class, 'post']);
Route::get('/quiz', [QuizController::class, 'index']);
Route::get('/finish', [FinishController::class, 'index']);
