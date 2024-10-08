<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Products;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categorias = Category::paginate(25);
        return view('admin.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //
        Category::create($request->all());
        return redirect()->away('/admin/categorias')->with('success', 'Categoria criado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $category = Category::find($id);
        return view('admin.categorias.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $category = Category::find($id);
        return view('admin.categorias.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        //
        $category = Category::find($id);
        $category->update($request->all());
        return redirect()->away('/admin/categorias')->with('success', 'Categoria atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //    
        $category = Category::find($id);
        
        if (!$category || $category->produtos()->count() > 0) {
            return redirect()->away('/admin/categorias')->with('error', 'Categoria possui dependentes!');
        }
        $category->delete();
        return redirect()->away('/admin/categorias')->with('success', 'Categoria removida com suceso');
    }
}
