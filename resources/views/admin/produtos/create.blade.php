@extends('layout.app')
@section('title','Criando Novo Produto')
@section('content')
<h1>Novo Produto</h1>

<!--nome-->
<form action="/admin/produtos" method="POST">
    @csrf
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" maxlength="255" id="nome" value="{{old('nome')}}" class="form-control @error('nome') is-invalid @enderror">
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

    <!--preço-->

    <div class="form-group">
        <label for="preco">Preço:</label>
        <input type="number" name="preco" min="0" step="0,1" id="preco" value="{{old('preco')}}" class="form-control @error('preco') is-invalid @enderror">
        @if($errors->has('preco'))
        <div class="text-danger">
            @foreach($errors->get('preco') as $error)
            <p>{{$error}}</p>
            @endforeach
        </div>
        @endif
    </div>

    <!--slug-->

    <div class="form-group">
        <label for="slug">Slug:</label>
        <input type="text" name="slug" maxlength="255" id="slug" value="{{old('slug')}}" class="form-control @error('slug') is-invalid @enderror">
        @if($errors->has('slug'))
        <div class="text-danger">
            @foreach($errors->get('slug') as $error)
            <p>{{$error}}</p>
            @endforeach
        </div>
        @endif
    </div>

    <!--image-->

    <div class="form-group">
        <label for="image">Imagem:</label>
        <input type="text" name="image" maxlength="255" id="image" value="{{old('image')}}" class="form-control @error('image') is-invalid @enderror">
        @if($errors->has('image'))
        <div class="text-danger">
            @foreach($errors->get('image') as $error)
            <p>{{$error}}</p>
            @endforeach
        </div>
        @endif
    </div>

    <!-- categoria -->

    <div class="form-group">
        <label for="categoria">Categoria:</label>
        <select class="form-select form-select
         @error('id_category') is-invalid @enderror"
          aria-label="Selecione a categoria" 
          name="id_category" id="id_category">
            <option selected disabled>Selecione uma opção</option>
            @foreach($categorias as $categoria)            
            <option value="{{$categoria->id}}" {{old('id_category') == $categoria->id ? "selected" : ""}}>{{$categoria->nome}}</option>
            @endforeach
        </select>
        @if($errors->has('id_category'))
        <div class="text-danger">
            @foreach($errors->get('id_category') as $error)
            <p>{{$error}}</p>
            @endforeach
        </div>
        @endif
    </div>

    <button type="submit" class="btn btn-success mt-2">Salvar</button>
</form>

@endsection