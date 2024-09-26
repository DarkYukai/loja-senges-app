<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function index()
    {
        //estou pedindo os produtos paginados
        $produtos = Products::paginate(20);
        return view('site.home', compact(['produtos',]));
    }

    public function detalhes($slug){
    //procurar produto com base na slug
    $produto = Products::where('slug',$slug)->first();
    //passar o produto para a pagina de detalhes
    return view('site.detalhes',compact('produto'));
    }

    public function categoria($categoria){
        //pesquisa por nome
        //$categoria = Category::where('nome',$categoria)->first();
        $categoria = Category::find($categoria);
        //pesquisaros produtos
        $produtos = Products::where('id_category',$categoria->id)->paginate(8);
        return view('site.categoria',compact(['produtos','categoria']));
    }
}
