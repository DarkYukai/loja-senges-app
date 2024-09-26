@extends('layout.app')
@section('title', $categoria->nome)
@section('content')
<div class="row">
    <h2>Categoria: {{$categoria->nome}}</h2>
    @foreach($produtos as $produto)
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="card h-100">
            <img src="{{$produto->imagem}}" alt="{{$produto->nome}}" class="card-img-top">
            <div class="card-body">
                <h3 class="card-title">
                    {{Str::limit ($produto->nome,20)}}
                </h3>
                <p class="card-text">
                    {{Str::limit($produto->descricao,50)}}
                </p>
                <a href="/site/produtos/{{$produto->slug}}" class="btn btn-primary">
                    <i class="bi bi-eye">Ver</i>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@include('partials.pagination',[
'items' => $produtos,
'route' => '/site/categoria/'.$categoria->id
])
@endsection