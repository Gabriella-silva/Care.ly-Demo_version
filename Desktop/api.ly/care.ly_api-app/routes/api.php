<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IniciativaController;

Route::get('/iniciativas', [IniciativaController::class, 'index']);
Route::post('/iniciativas', [IniciativaController::class, 'store']);