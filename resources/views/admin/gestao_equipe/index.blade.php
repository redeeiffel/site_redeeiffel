@extends('layouts.main_admin')

@section('content')

<style>
    .equipa-admin {
        padding: 35px 0 65px;
    }

    .equipa-admin .painel {
        background: #fff;
        border-radius: 14px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 4px 20px rgba(0,0,0,.07);
    }

    .equipa-admin .titulo {
        color: #263238;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .equipa-admin .subtitulo {
        color: #607d8b;
        margin-bottom: 25px;
    }

    .equipa-admin .campo {
        margin-bottom: 18px;
    }

    .equipa-admin .campo label {
        display: block;
        position: static;
        font-size: 13px;
        color: #455a64;
        margin-bottom: 7px;
    }

    .equipa-admin .campo input,
    .equipa-admin .campo select,
    .equipa-admin .campo textarea {
        display: block;
        box-sizing: border-box;
        width: 100%;
        height: auto;
        min-height: 42px;
        padding: 9px 12px;
        border: 1px solid #cfd8dc;
        border-radius: 7px;
        background: #fff;
        color: #263238;
        font-size: 14px;
    }

    .equipa-admin .campo textarea {
        min-height: 95px;
        resize: vertical;
    }

    .equipa-admin .campo input[type=file] {
        padding: 8px;
    }

    .equipa-admin .btn-equipa {
        display: inline-block;
        border: none;
        border-radius: 7px;
        padding: 11px 19px;
        background: #1565c0;
        color: #fff;
        cursor: pointer;
        font-weight: 600;
    }

    .equipa-admin .btn-equipa.verde {
        background: #2e7d32;
    }

    .equipa-admin .btn-equipa.cinza {
        background: #546e7a;
    }

    .equipa-admin .btn-equipa.laranja {
        background: #ef6c00;
    }

    .equipa-admin .instituicao {
        border: 1px solid #e0e6ea;
        border-radius: 12px;
        margin-bottom: 18px;
        overflow: hidden;
    }

    .equipa-admin .instituicao > summary {
        padding: 18px;
        background: #f3f7fa;
        font-weight: 700;
        cursor: pointer;
        color: #263238;
    }

    .equipa-admin .conteudo-instituicao {
        padding: 22px;
    }

    .equipa-admin .membro {
        border: 1px solid #e0e6ea;
        border-radius: 10px;
        padding: 18px;
        margin: 15px 0;
    }

    .equipa-admin .foto {
        width: 95px;
        height: 105px;
        object-fit: cover;
        border-radius: 8px;
        background: #eceff1;
    }

    .equipa-admin .acoes {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 15px;
    }

    .equipa-admin .estado {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 12px;
        background: #e8f5e9;
        color: #2e7d32;
    }

    .equipa-admin .estado.inativo {
        background: #ffebee;
        color: #c62828;
    }

    .equipa-admin .aviso {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 8px;
        background: #e8f5e9;
        color: #256029;
    }

    .equipa-admin .erro {
        background: #ffebee;
        color: #b71c1c;
    }

    .equipa-admin .divisor {
        margin: 25px 0;
        border: 0;
        border-top: 1px solid #e0e0e0;
    }
</style>

<div class="container equipa-admin">

    <h4 class="titulo">Gerir Liceus e Equipa</h4>

    <p class="subtitulo">
        Administração da Coordenação Nacional e das direções dos Liceus Eiffel.
    </p>

    @if(session('success'))
        <div class="aviso">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="aviso erro">
            <strong>Verifica os seguintes campos:</strong>
            <ul>
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- ADICIONAR LICEU --}}

    <div class="painel">

        <h5 class="titulo">
            <i class="fa fa-school"></i>
            Adicionar novo liceu
        </h5>

        <p class="subtitulo">
            Regista uma nova instituição. Os membros poderão ser adicionados posteriormente.
        </p>

        <form method="POST"
              action="{{ route('admin.gestao_equipe.liceus.guardar') }}">

            @csrf

            <div class="row">

                <div class="col s12 m6 campo">
                    <label>Nome completo do liceu *</label>
                    <input type="text"
                           name="nome"
                           value="{{ old('nome') }}"
                           required
                           maxlength="255">
                </div>

                <div class="col s12 m6 campo">
                    <label>Código do liceu (opcional)</label>
                    <input type="text"
                           name="codigo"
                           value="{{ old('codigo') }}"
                           maxlength="50">
                </div>

                <div class="col s12 campo">
                    <label>Website (opcional)</label>
                    <input type="url"
                           name="website"
                           value="{{ old('website') }}"
                           placeholder="https://exemplo.redeeiffel.ao">
                </div>

            </div>

            <button type="submit" class="btn-equipa verde">
                <i class="fa fa-plus"></i>
                Adicionar liceu
            </button>

        </form>

    </div>

    {{-- LISTA DE INSTITUIÇÕES --}}

    <div class="painel">

        <h5 class="titulo">Instituições e membros</h5>

        <p class="subtitulo">
            Abre uma instituição para gerir os seus dados e os respetivos membros.
        </p>

        @foreach($liceus as $liceu)

            <details class="instituicao"
                     id="instituicao-{{ $liceu->id }}">

                <summary>
                    {{ $liceu->nome }}

                    <span class="estado {{ $liceu->ativo ? '' : 'inativo' }}">
                        {{ $liceu->ativo ? 'Ativo' : 'Inativo' }}
                    </span>

                    <small>
                        ({{ $liceu->membros->count() }} membros)
                    </small>
                </summary>

                <div class="conteudo-instituicao">

                    <h6 class="titulo">Dados da instituição</h6>

                    <form method="POST"
                          action="{{ route('admin.gestao_equipe.liceus.atualizar', $liceu) }}">

                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col s12 m6 campo">
                                <label>Nome</label>
                                <input type="text"
                                       name="nome"
                                       value="{{ $liceu->nome }}"
                                       maxlength="255"
                                       required
                                       {{ $liceu->tipo === 'coordenacao' ? 'readonly' : '' }}>
                            </div>

                            <div class="col s12 m6 campo">
                                <label>Código</label>
                                <input type="text"
                                       name="codigo"
                                       value="{{ $liceu->codigo }}"
                                       maxlength="50"
                                       {{ $liceu->tipo === 'coordenacao' ? 'readonly' : '' }}>
                            </div>

                            <div class="col s12 m8 campo">
                                <label>Website</label>
                                <input type="url"
                                       name="website"
                                       value="{{ $liceu->website }}">
                            </div>

                            <div class="col s12 m4 campo">
                                <label>Estado</label>

                                <select name="ativo"
                                        {{ $liceu->tipo === 'coordenacao' ? 'disabled' : '' }}>

                                    <option value="1" {{ $liceu->ativo ? 'selected' : '' }}>
                                        Ativo
                                    </option>

                                    <option value="0" {{ !$liceu->ativo ? 'selected' : '' }}>
                                        Inativo
                                    </option>

                                </select>

                                @if($liceu->tipo === 'coordenacao')
                                    <input type="hidden" name="ativo" value="1">
                                @endif
                            </div>

                        </div>

                        <button type="submit" class="btn-equipa">
                            Guardar instituição
                        </button>

                    </form>

                    <hr class="divisor">

                    {{-- ADICIONAR MEMBRO --}}

                    <h6 class="titulo">
                        <i class="fa fa-user-plus"></i>
                        Adicionar membro
                    </h6>

                    <form method="POST"
                          enctype="multipart/form-data"
                          action="{{ route('admin.gestao_equipe.membros.guardar') }}">

                        @csrf

                        <input type="hidden"
                               name="liceu_id"
                               value="{{ $liceu->id }}">

                        <div class="row">

                            <div class="col s12 m6 campo">
                                <label>Nome completo *</label>
                                <input type="text"
                                       name="nome"
                                       required
                                       maxlength="255">
                            </div>

                            <div class="col s12 m6 campo">
                                <label>Cargo *</label>
                                <input type="text"
                                       name="cargo"
                                       required
                                       maxlength="255"
                                       placeholder="Ex.: Diretor Geral">
                            </div>

                            <div class="col s12 campo">
                                <label>Breve biografia (opcional)</label>
                                <textarea name="biografia"
                                          maxlength="5000"></textarea>
                            </div>

                            <div class="col s12 campo">
                                <label>Fotografia (JPG, PNG ou WEBP, até 3 MB)</label>
                                <input type="file"
                                       name="fotografia"
                                       accept=".jpg,.jpeg,.png,.webp">
                            </div>

                        </div>

                        <x-editor-imagem campo="fotografia" />

                        <button type="submit" class="btn-equipa verde">
                            <i class="fa fa-user-plus"></i>
                            Adicionar membro
                        </button>

                    </form>

                    <hr class="divisor">

                    {{-- MEMBROS REGISTADOS --}}

                    <h6 class="titulo">
                        Membros registados
                    </h6>

                    @forelse($liceu->membros as $membro)

                        <div class="membro">

                            <div class="row">

                                <div class="col s12 m3">

                                    @if($membro->fotografia)
                                        <img class="foto"
                                             src="{{ asset('storage/' . $membro->fotografia) }}"
                                             alt="Fotografia de {{ $membro->nome }}">
                                    @else
                                        <div class="foto"
                                             style="display:flex;align-items:center;justify-content:center;">
                                            <i class="fa fa-user fa-3x grey-text"></i>
                                        </div>
                                    @endif

                                    <p>
                                        <span class="estado {{ $membro->ativo ? '' : 'inativo' }}">
                                            {{ $membro->ativo ? 'Ativo' : 'Inativo' }}
                                        </span>
                                    </p>

                                </div>

                                <div class="col s12 m9">

                                    <form method="POST"
                                          enctype="multipart/form-data"
                                          action="{{ route('admin.gestao_equipe.membros.atualizar', $membro) }}">

                                        @csrf
                                        @method('PUT')

                                        <div class="row">

                                            <div class="col s12 m6 campo">
                                                <label>Nome</label>
                                                <input type="text"
                                                       name="nome"
                                                       value="{{ $membro->nome }}"
                                                       required>
                                            </div>

                                            <div class="col s12 m6 campo">
                                                <label>Cargo</label>
                                                <input type="text"
                                                       name="cargo"
                                                       value="{{ $membro->cargo }}"
                                                       required>
                                            </div>

                                            <div class="col s12 campo">
                                                <label>Biografia</label>
                                                <textarea name="biografia">{{ $membro->biografia }}</textarea>
                                            </div>

                                            <div class="col s12 m4 campo">
                                                <label>Ordem de apresentação</label>
                                                <input type="number"
                                                       name="ordem"
                                                       min="0"
                                                       value="{{ $membro->ordem }}"
                                                       required>
                                            </div>

                                            <div class="col s12 m4 campo">
                                                <label>Estado</label>
                                                <select name="ativo">
                                                    <option value="1" {{ $membro->ativo ? 'selected' : '' }}>
                                                        Ativo
                                                    </option>
                                                    <option value="0" {{ !$membro->ativo ? 'selected' : '' }}>
                                                        Inativo
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="col s12 m4 campo">
                                                <label>Substituir fotografia</label>
                                                <input type="file"
                                                       name="fotografia"
                                                       accept=".jpg,.jpeg,.png,.webp">
                                            </div>

                                        </div>

                                        <x-editor-imagem
                                            campo="fotografia"
                                            :imagem="$membro->fotografia ? asset('storage/' . $membro->fotografia) : null"
                                            :posicao-x="$membro->ajusteFotografia()?->posicao_x ?? 50"
                                            :posicao-y="$membro->ajusteFotografia()?->posicao_y ?? 15"
                                            :zoom="$membro->ajusteFotografia()?->zoom ?? 100"
                                        />

                                        <button type="submit" class="btn-equipa">
                                            Guardar alterações
                                        </button>

                                    </form>

                                    <form method="POST"
                                          style="margin-top:12px;"
                                          action="{{ route('admin.gestao_equipe.membros.estado', $membro) }}">

                                        @csrf
                                        @method('PATCH')

                                        <button type="submit"
                                                class="btn-equipa {{ $membro->ativo ? 'laranja' : 'verde' }}">
                                            {{ $membro->ativo ? 'Desativar membro' : 'Ativar membro' }}
                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    @empty

                        <p class="grey-text">
                            Ainda não existem membros registados nesta instituição.
                        </p>

                    @endforelse

                </div>

            </details>

        @endforeach

    </div>

</div>

<script src="{{ asset('assets/js/editor-imagem-eiffel.js') }}"></script>

@endsection