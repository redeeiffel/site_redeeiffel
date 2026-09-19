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
                    <th>Email</th>
                   
                </tr>
            </thead>

            <tbody>
                @forelse($news as $pub)
                    <tr>
                        <td>{{ $pub->id }}</td>
                        <td>{{ $pub->email }}</td>
                       
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