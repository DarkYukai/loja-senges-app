<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SiteController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('site.home');
Route::get('/site/produtos/{slug}', [SiteController::class, 'detalhes'])->name('site.detalhes');
Route::get('/site/categoria/{categoria}', [SiteController::class, 'categoria'])->name('site.categoria');
//rotas do carrinho
Route::get('/carrinho',[CarrinhoController::class,'lista'])->name('site.carrinho');
Route::post('/carrinho',[CarrinhoController::class,'adicionarCarrinho'])->name('site.carrinho');
Route::post('/carrinho/remove',[CarrinhoController::class,'removerCarrinho'])->name('site.remcarrinho');
Route::post('/carrinho/atualiza',[CarrinhoController::class,'atualizarCarrinho'])->name('site.updatecarrinho');
Route::get('/carrinho/limpar',[CarrinhoController::class,'limparCarrinho'])->name('site.limparcarrinho');

Route::resource('/admin/categorias',CategoryController::class);
Route::resource('/admin/produtos',ProductsController::class);