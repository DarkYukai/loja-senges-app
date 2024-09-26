@extends('layout.app')
<!-- passar o nome da pagina para o titulo-->
@section('title', 'Home')

<!--inserir no yield do app sheet este fragmento-->
@section('content')

<div class="row">
    @foreach($produtos as $produto)
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="card h-100">
            <img src="{{$produto->imagem}}" alt="{{$produto->nome}}" class="card-img-top">
            <div class="car-body">
                <h5 class="card-title">
                    {{Str::limit($produto->nome,30)}}
                </h5>
                <p class="card-text">
                    {{Str::limit($produto->nome,50)}}
                </p>
                <a href="/site/produtos/{{$produto->slug}}"
                    class="btn btn-primary">
                    <i class="bi bi-eye">Ver</i>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!--pagination-->
<!--{{$produtos->links('pagination::bootstrap-5')}}-->
<!--componente de paginacao-->
@include('partials.pagination',[
'items' => $produtos,
'route' => '/'
])
@endsection