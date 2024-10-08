@extends('layout.app')
@section('title','Editando categoria')
@section('content')
<h1>Editando categoria</h1>

<form action="/admin/categorias/{{$category->id}}" method="POST">
    @csrf
    <!--inserindo metodo put-->
    @method('PUT')
    <!--nome-->
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" maxlength="255" id="nome" value="{{old('nome', $category->nome)}}" class="form-control @error('nome') is-invalid @enderror">
        @if($errors->has('nome'))
        <div class="text-danger">
            @foreach($errors->get('nome') as $error)
            <p>{{$error}}</p>
            @endforeach
        </div>
        @endif
    </div>

    <!--descrição-->

    <div class="form-group">
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" minlength="3" id="descricao" class="form-control @error('descricao') is-invalid @enderror">
        {{old('descricao', $category->descricao)}}
        </textarea>
        @if($errors->has('descricao'))
        <div class="text-danger">
            @foreach($errors->get('descricao') as $error)
            <p>{{$error}}</p>
            @endforeach
        </div>
        @endif
    </div>
    <button type="submit" class="btn btn-success mt-2">Salvar</button>
</form>

@endsection