<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('site.home');
Route::get('/site/produtos/{slug}', [SiteController::class, 'detalhes'])->name('site.detalhes');
Route::get('/site/categoria/{categoria}', [SiteController::class, 'categoria'])->name('site.categoria');
//rotas do carrinho
Route::get('/carrinho',[CarrinhoController::class,'lista'])->name('site.carrinho');