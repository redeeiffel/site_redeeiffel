
@extends('layouts.main_admin')

@section('content')
<style>
    .projectos-admin h4 { color: #103c73; font-weight: 700; }
    .projectos-admin .card { border-radius: 12px; overflow: hidden; }
    .projectos-admin .btn { border-radius: 6px; text-transform: none; }
    .projectos-admin .table-wrap { overflow-x: auto; }
    .projectos-admin table td { vertical-align: middle; }
    .projectos-admin .foto {
        width: 90px;
        height: 65px;
        object-fit: cover;
        border-radius: 6px;
    }
    .projectos-admin .acoes {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
    }
</style>

<div class="projectos-admin">
    <div class="row">
        <div class="col s12 m8">
            <h4>Gestão de Projectos</h4>
            <p>Registe e actualize os projectos da Rede Eiffel.</p>
        </div>
        <div class="col s12 m4 right-align">
            <a href="{{ route('admin.projectos.create') }}"
               class="btn blue darken-3">
                <i class="fa fa-plus"></i> Novo Projecto
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="card-panel green lighten-4 green-text text-darken-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-content">
            <div class="table-wrap">
                <table class="highlight responsive-table">
                    <thead>
                        <tr>
                            <th>Fotografia</th>
                            <th>Projecto</th>
                            <th>Categoria</th>
                            <th>Liceu</th>
                            <th>Estado</th>
                            <th>Acções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($projectos as $projecto)
                            <tr>
                                <td>
                                    @if($projecto->fotografia)
                                        <img
                                            src="{{ asset('storage/'.$projecto->fotografia) }}"
                                            class="foto"
                                            alt="{{ $projecto->titulo }}">
                                    @else
                                        <span class="grey-text">Sem foto</span>
                                    @endif
                                </td>
                                <td>{{ $projecto->titulo }}</td>
                                <td>
                                    {{ \App\Models\Projecto::CATEGORIAS[$projecto->categoria] ?? $projecto->categoria }}
                                </td>
                                <td>{{ $projecto->liceu ?: 'Rede Eiffel' }}</td>
                                <td>
                                    @if($projecto->publicado)
                                        <span class="green-text">Publicado</span>
                                    @else
                                        <span class="orange-text text-darken-3">Rascunho</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="acoes">
                                        <a href="{{ route('admin.projectos.edit', $projecto) }}"
                                           class="btn-small blue">
                                            Editar
                                        </a>

                                        <form method="POST"
                                              action="{{ route('admin.projectos.destroy', $projecto) }}"
                                              onsubmit="return confirm('Eliminar este projecto definitivamente?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn-small red">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="center-align">
                                    Ainda não existem projectos registados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div style="margin-top: 20px;">
                {{ $projectos->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
