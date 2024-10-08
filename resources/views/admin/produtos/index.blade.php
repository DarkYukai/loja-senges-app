<!--herdar as configurações do layout-->
@extends('layout.app')
<!--ajustar o titulo-->
@section('title','produtos')
<!--criar o conteudo-->
@section('content')
<!--titulo h1, h2, h3-->
<h1>Produtos</h1>
<a href="/admin/produtos/create" class="btn btn-success">Novo</a>
<div style="width: 80%">
    <table class="table table-striped table-responsive mt-3 text-center">
        <thead>
            <th>Nome</th>
            <th>Preço</th>
            <th colspan="3" style="width:10%">Ações</th>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
            <tr>
                <td>{{$produto->nome}}</td>
                <td>R$ {{ number_format($produto->price, 2,',',',')}}</td>
                <!--show-->
                <td>
                    <a href="/admin/produtos/{{$produto->id}}" class="btn btn-primary">
                        <i class="bi bi-eye"></i>
                    </a>
                </td>
                <!--edit-->
                <td>
                    <a href="/admin/produtos/{{$produto->id}}/edit" class="btn btn-success">
                        <i class="bi bi-pencil"></i>
                    </a>
                </td>
                <!--remover-->
                <td>
                    <form action="/admin/produtos/{{$produto->id}}" method="POST">
                        <!--token-->
                        @csrf
                        <!--alterar para metodo dalete-->
                        @method('DELETE')
                        <button class="btn btn-danger">
                        <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection