@extends('layout.app')
@section('title','Editando produto')
@section('content')
<h1>Editando categoria</h1>

<form action="/admin/produtos/{{$product->id}}" method="POST">
    @csrf
    <!--inserindo metodo put-->
    @method('PUT')
    <!--nome-->
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" maxlength="255" id="nome" value="{{old('nome', $product->nome)}}" class="form-control @error('nome') is-invalid @enderror">
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
        {{old('descricao', $product->descricao)}}
        </textarea>
        @if($errors->has('descricao'))
        <div class="text-danger">
            @foreach($errors->get('descricao') as $error)
            <p>{{$error}}</p>
            @endforeach
        </div>
        @endif
    </div>
    
    <!--preco-->
    
    <div class="form-group">
        <label for="preco">Preço:</label>
        <input type="number" name="preco" min="0" step="0.1" id="preco" value="{{old('preco', $product->preco)}}" class="form-control @error('preco') is-invalid @enderror">
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
        <input type="text" name="slug" maxlength="255" id="slug" value="{{old('slug', $product->slug)}}" class="form-control @error('slug') is-invalid @enderror">
        @if($errors->has('slug'))
        <div class="text-danger">
            @foreach($errors->get('slug') as $error)
            <p>{{$error}}</p>
            @endforeach
        </div>
        @endif
    </div>

    <!--imagem-->
    
    <div class="form-group">
        <label for="imagem">Imagem:</label>
        <input type="text" name="imagem" maxlength="255" id="imagem" value="{{old('imagem', $product->imagem)}}" class="form-control @error('imagem') is-invalid @enderror">
        @if($errors->has('imagem'))
        <div class="text-danger">
            @foreach($errors->get('imagem') as $error)
            <p>{{$error}}</p>
            @endforeach
        </div>
        @endif
    </div>

    <!--categoria-->

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