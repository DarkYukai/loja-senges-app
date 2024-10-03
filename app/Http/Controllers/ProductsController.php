<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Models\Category;
use App\Models\Products;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //eu vou buscar informaçoes do banco
        $produtos = Products::paginate(25);
        return view('admin.produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //aqui eu carrego a informação necessaria para criar um novo registro
        //carregar as categorias
        $categorias = Category::all();
        return view('admin.produtos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductsRequest $request)
    {
        //salva o registro atraves do modelo
        Products::create($request->all());
        //redireciona ou gera um response
        return redirect()->away('/produtos')->with('success', 'Produto criado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //        
        return view('admin.produtos.show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {
        //
        $categorias = Category::all();
        return view('admin.produtos.edit', compact('products', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductsRequest $request, Products $products)
    {
        //
        $products->update($request->all());
        return redirect()->away('/produtos')->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products)
    {
        //
        $products->delete();
        return redirect()->away('/produtos')->with('success', 'Produto removido com sucesso!');
    }
}
