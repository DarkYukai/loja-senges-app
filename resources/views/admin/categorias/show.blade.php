@extends('layout.app')
@section('title',$category->nome)
@section('content')

<div>    
    <h1>{{$category->nome}}</h1>
    <p>{{$category->descricao}}</p>
    <a href="/admin/categorias" class="btn btn-primary">Voltar</a>
</div>

@endsection