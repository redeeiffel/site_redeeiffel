@extends('layouts.main_admin')

@section('content')
@php
    $edicao = isset($video);
    $categorias = [
        'aulas' => 'Aulas',
        'actividades' => 'Actividades',
        'laboratorios' => 'Laboratórios',
        'projectos' => 'Projectos',
        'testemunhos' => 'Testemunhos',
    ];
    $origemActual = old('origem', $edicao ? ($video->origem ?? 'youtube') : 'youtube');
    $urlActual = old('url_video_input', $edicao ? ($video->url_video ?? '') : '');
@endphp

<style>
.video-form-card { background:#fff; border-radius:16px; padding:28px; margin:25px 0; box-shadow:0 6px 24px rgba(0,40,90,.08); }
.video-form-card h4 { color:#075a9c; font-weight:700; }
.video-form-card label { display:block; font-weight:600; margin-bottom:8px; color:#294560; }
.video-form-card .campo { width:100%; box-sizing:border-box; padding:12px; border:1px solid #d4dfeb; border-radius:8px; background:white; margin-bottom:20px; min-height:45px; }
.video-form-card textarea.campo { min-height:120px; }
.video-form-card .acoes { display:flex; gap:12px; flex-wrap:wrap; }
.video-form-card .origem-opcoes { display:flex; flex-wrap:wrap; gap:12px; margin:8px 0 22px; }
.video-form-card .origem-opcao { border:1px solid #d4dfeb; border-radius:10px; padding:12px 16px; cursor:pointer; background:#f7fbff; display:flex; align-items:center; gap:9px; }
.video-form-card .origem-opcao input { position:static !important; opacity:1 !important; pointer-events:auto !important; width:17px; height:17px; margin:0; }
.video-form-card .ajuda { color:#60778c; font-size:14px; margin:-10px 0 20px; }
.video-form-card .origem-painel { padding:16px; border:1px solid #dce9f4; border-radius:12px; margin-bottom:20px; }
.video-form-card .origem-painel[hidden] { display:none !important; }
.video-form-card .video-atual { max-width:100%; width:420px; border-radius:10px; margin:5px 0 15px; }
@media(max-width:600px) { .video-form-card { padding:18px; } }
</style>

<div class="row">
    <div class="col s12 l10 offset-l1">
        <div class="video-form-card">
            <h4><i class="fa fa-video-camera"></i> {{ $edicao ? 'Editar Vídeo' : 'Publicar Novo Vídeo' }}</h4>
            <p class="grey-text">Partilhe vídeos das actividades e projectos da Rede Eiffel.</p>

            @if($errors->any())
                <div class="card-panel red lighten-5 red-text text-darken-4">
                    <strong>Corrija os erros:</strong>
                    <ul>@foreach($errors->all() as $erro)<li>{{ $erro }}</li>@endforeach</ul>
                </div>
            @endif

            <form action="{{ $edicao ? route('admin.videos.update', $video->id) : route('admin.videos.store') }}"
                  method="POST" enctype="multipart/form-data" id="form-video">
                @csrf
                @if($edicao) @method('PUT') @endif

                <label for="titulo">Título do vídeo</label>
                <input id="titulo" type="text" name="titulo" class="campo" maxlength="255"
                       value="{{ old('titulo', $video->titulo ?? '') }}" required>

                <label for="categoria">Categoria</label>
                <select id="categoria" name="categoria" class="browser-default campo" required>
                    <option value="">Seleccione uma categoria</option>
                    @foreach($categorias as $valor => $nome)
                        <option value="{{ $valor }}" {{ old('categoria', $video->categoria ?? '') === $valor ? 'selected' : '' }}>{{ $nome }}</option>
                    @endforeach
                </select>

                <label for="descricao">Descrição</label>
                <textarea id="descricao" name="descricao" class="browser-default campo" maxlength="5000">{{ old('descricao', $video->descricao ?? '') }}</textarea>

                <label>Origem do vídeo</label>
                <div class="origem-opcoes">
                    <label class="origem-opcao" for="origem-youtube">
                        <input type="radio" id="origem-youtube" name="origem" value="youtube" {{ $origemActual === 'youtube' ? 'checked' : '' }}>
                        <span><i class="fa fa-youtube-play"></i> YouTube</span>
                    </label>
                    <label class="origem-opcao" for="origem-ficheiro">
                        <input type="radio" id="origem-ficheiro" name="origem" value="ficheiro" {{ $origemActual === 'ficheiro' ? 'checked' : '' }}>
                        <span><i class="fa fa-upload"></i> Ficheiro do computador</span>
                    </label>
                </div>

                <div id="painel-youtube" class="origem-painel">
                    <label for="url_video_input">Ligação do vídeo no YouTube</label>
                    <input id="url_video_input" type="url" name="url_video_input" class="campo" maxlength="500"
                           placeholder="https://www.youtube.com/watch?v=..." value="{{ $urlActual }}">
                    <p class="ajuda">Aceita ligações do YouTube, YouTube Shorts e youtu.be.</p>
                </div>

                <div id="painel-ficheiro" class="origem-painel" hidden>
                    @if($edicao && ($video->origem ?? '') === 'ficheiro' && $video->ficheiro_video)
                        <p><strong>Vídeo actualmente guardado:</strong></p>
                        <video class="video-atual" controls preload="metadata">
                            <source src="{{ asset('storage/' . $video->ficheiro_video) }}">
                            O navegador não suporta a reprodução deste vídeo.
                        </video>
                        <p class="ajuda">Se não escolheres outro ficheiro, o vídeo actual será mantido.</p>
                    @endif
                    <label for="ficheiro_video">Seleccionar vídeo do computador</label>
                    <input id="ficheiro_video" type="file" name="ficheiro_video" class="campo"
                           accept=".mp4,.webm,.mov,video/mp4,video/webm,video/quicktime">
                    <p class="ajuda">Formatos MP4, WebM ou MOV. Limite: 500 MB (512 000 KB).</p>
                    <p id="tamanho-video" class="ajuda" aria-live="polite"></p>
                </div>

                @if($edicao && $video->imagem_capa)
                    <p><strong>Capa actual:</strong></p>
                    <img src="{{ asset('media/videos/' . $video->imagem_capa) }}" alt="Capa do vídeo"
                         style="max-width:250px;border-radius:10px;margin-bottom:15px;">
                @endif

                <label for="imagem_capa">Imagem de capa (opcional)</label>
                <input id="imagem_capa" type="file" name="imagem_capa" accept=".jpg,.jpeg,.png,.webp" class="campo">
                <p class="ajuda">Formatos JPG, PNG ou WEBP. Máximo 5 MB.</p>

                <p><label>
                    <input type="hidden" name="publicado" value="0">
                    <input type="checkbox" name="publicado" value="1" {{ old('publicado', $video->publicado ?? true) ? 'checked' : '' }}>
                    <span>Publicar vídeo no site</span>
                </label></p>

                <div class="acoes" style="margin-top:25px;">
                    <button type="submit" class="btn blue"><i class="fa fa-save"></i> {{ $edicao ? 'Guardar Alterações' : 'Publicar Vídeo' }}</button>
                    <a href="{{ route('admin.videos.index') }}" class="btn grey lighten-2 black-text">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const youtube = document.getElementById('origem-youtube');
    const ficheiro = document.getElementById('origem-ficheiro');
    const painelYoutube = document.getElementById('painel-youtube');
    const painelFicheiro = document.getElementById('painel-ficheiro');
    const campoUrl = document.getElementById('url_video_input');
    const campoFicheiro = document.getElementById('ficheiro_video');
    const tamanho = document.getElementById('tamanho-video');
    const maxBytes = 512000 * 1024;
    const ficheiroExistente = @json($edicao && ($video->origem ?? '') === 'ficheiro' && !empty($video->ficheiro_video));
    const youtubeExistente = @json($edicao && !empty($video->url_video));

    function actualizarOrigem() {
        const usarFicheiro = ficheiro.checked;
        painelYoutube.hidden = usarFicheiro;
        painelFicheiro.hidden = !usarFicheiro;
        campoUrl.disabled = usarFicheiro;
        campoFicheiro.disabled = !usarFicheiro;
        campoUrl.required = !usarFicheiro && !youtubeExistente;
        campoFicheiro.required = usarFicheiro && !ficheiroExistente;
    }

    youtube.addEventListener('change', actualizarOrigem);
    ficheiro.addEventListener('change', actualizarOrigem);
    campoFicheiro.addEventListener('change', function () {
        const f = this.files && this.files[0];
        if (!f) { tamanho.textContent = ''; return; }
        const mb = (f.size / (1024 * 1024)).toFixed(1);
        tamanho.textContent = 'Ficheiro seleccionado: ' + f.name + ' (' + mb + ' MB)';
        tamanho.style.color = f.size > maxBytes ? '#b71c1c' : '#60778c';
        if (f.size > maxBytes) tamanho.textContent += ' — excede o limite de 500 MB.';
    });
    document.getElementById('form-video').addEventListener('submit', function (event) {
        const f = campoFicheiro.files && campoFicheiro.files[0];
        if (ficheiro.checked && f && f.size > maxBytes) {
            event.preventDefault();
            alert('O vídeo excede o limite máximo de 500 MB.');
        }
    });
    actualizarOrigem();
});
</script>
@endsection
