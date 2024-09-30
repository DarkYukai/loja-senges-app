<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart;

class CarrinhoController extends Controller
{
    //metodo responsavel pela visualizacao do cariinho
    public function lista(){
        //pegar itens do carrinho
        $items = \Cart::getContent();
        //redirecionar para a view carrinho e passar itens
        return view('site.carrinho', compact('items'));
    }
}
