@extends('layout.app')
@section('title','Criando nova categoria')
@section('content')
<h1>Nova categoria</h1>

<!--nome-->
<form action="/admin/categorias" method="POST">
    @csrf
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" maxlength="255" value="{{old('nome')}}" class="form-control @error('nome') is-invalid @enderror">
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
        <textarea name="descricao" minlength="3" id="descricao" value="{{old('descricao')}}" class="form-control @error('descricao') is-invalid @enderror">
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