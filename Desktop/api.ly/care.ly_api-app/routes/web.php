<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IniciativaController;

// Painel de Admin (Laravel Blade)
Route::get('/admin/iniciativas/create', [IniciativaController::class, 'create'])->name('admin.iniciativas.create');
Route::post('/admin/iniciativas', [IniciativaController::class, 'store'])->name('admin.iniciativas.store');

// API (para o React consumir)
Route::get('/api/iniciativas', [IniciativaController::class, 'index']);
Route::post('/api/iniciativas', [IniciativaController::class, 'store']);
