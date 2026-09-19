@extends('layouts.main_admin') {{-- ajusta conforme o nome do teu layout --}}

@section('content')
@if (Session::get('success'))
<div class="card-body">
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h5><i class="icon fas fa-check"></i> Sucesso!</h5>
        {{ Session::get('success') }}
    </div>
</div>
@endif

@if (Session::get('fail'))
<div class="card-body">
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h5><i class="icon fas fa-ban"></i> Falha!</h5>
        {{ Session::get('fail') }}
    </div>
</div>
@endif

<div class="row">
    <div class="col s12">
        <h4>Lista de Publicações</h4>

        <table class="striped responsive-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>telefone</th>
                    <th>Email</th>
                    <th>Assunto</th>
                    <th>Mensagem</th>
                </tr>
            </thead>

            <tbody>
                @forelse($mensagens as $pub)
                    <tr>
                        <td>{{ $pub->nome }}</td>
                        <td>{{ $pub->telefone }}</td>
                        <td>{{ $pub->email }}</td>
                        <td>{{ $pub->assunto }}</td>
                        <td>{{ $pub->mensagem }}</td>

                        <td>
                            <a href="{{ route('admin.ver_publicacao', $pub->id) }}" class="btn blue btn-small">
                                <i class="fa fa-eye"></i>
                            </a>

                            <a href="{{ route('admin.edit_publicacao', $pub->id) }}" class="btn orange btn-small">
                                <i class="fa fa-edit"></i>
                            </a>

                            <form action="{{ route('admin.delete_publicacao', $pub->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn red btn-small" onclick="return confirm('Deseja eliminar?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="center">Nenhuma publicação encontrada</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection