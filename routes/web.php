<?php

use App\Livewire\ArticleShow;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/articles/{article:slug}', ArticleShow::class);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
