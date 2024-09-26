<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('site.home');
Route::get('/site/produtos/{slug}', [SiteController::class, 'detalhes'])->name('site.detalhes');
Route::get('/site/categoria/{categoria}', [SiteController::class, 'categoria'])->name('site.categoria');
