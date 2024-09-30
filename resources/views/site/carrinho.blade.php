@extends('layout.app')
@section('title', 'Carrinho de Compras')
@section('content')
<!--Verificar se tem algum item no cariinho-->
<div class="row">
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 mx-auto">
        @if($items->count() == 0)
        <!--se estiver mostre mostre sem itens-->
        <h2>Carrinho Vazio!</h2>
        @else
        <!--se tiver mostre o html-->
        <!--intere os items-->
        <table class="table mt-3 table-bordered text-center striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>
                        <img src="{{$item->imagem}}" alt="{{$item->nome}}"
                            class="img-fluid rounded-circle" width="80px">
                    </td>
                    <td>
                        {{$item->nome}}
                    </td>
                    <td>
                        R$ {{ number_format($item->price, 2,',',',')}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection()