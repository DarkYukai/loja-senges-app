<!--herdar as configurações do layout-->
@extends('layout.app')
<!--ajustar o titulo-->
@section('title','Categorias')
<!--criar o conteudo-->
@section('content')
<!--titulo h1, h2, h3-->
<h1>Categorias</h1>
<a href="/admin/categorias/create" class="btn btn-success">Novo</a>
<div style="width: 80%">
    <table class="table table-striped table-responsive mt-3 text-center">
        <thead>
            <th>Nome</th>
            <th colspan="3" style="width:10%">Ações</th>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td>{{$categoria->nome}}</td>
                <!--show-->
                <td>
                    <a href="/admin/categorias/{{$categoria->id}}" class="btn btn-primary">
                        <i class="bi bi-eye"></i>
                    </a>
                </td>
                <!--edit-->
                <td>
                    <a href="/admin/categorias/{{$categoria->id}}/edit" class="btn btn-success">
                        <i class="bi bi-pencil"></i>
                    </a>
                </td>
                <!--remover-->
                <td>
                    <form action="/admin/categorias/{{$categoria->id}}" method="POST">
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



<!--modal de confirmação-->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--cabeç<alho-->
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Remoção</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">

                </button>
            </div>
            <!--corpo-->
            <div class="modal-body">
                Tem certesa que deseja remover este categoria?
            </div>
            <!--footer-->
            <div class="modal-footer">
                <form id="deleteForm" method="POST" action="/admin/categorias/{{$categoria->id}}">
                    <!--token-->
                    @csrf
                    <!--alterar para metodo dalete-->
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Canselar
                    </button>
                    <button type="submit" class="btn btn-danger">
                        Remover
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var confirmDeleteModal = document.getElementById("confirmDeleteModal");
    confirmDeleteModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        var categoryId = button.getAttribute('data-category-id');
        var form = document.getElementById('deleteForm');
        form.action = '/admin/categorias/' + categoryId;
    });
</script>
@endsection