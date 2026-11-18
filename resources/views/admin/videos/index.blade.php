
@extends('layouts.main_admin')

@section('content')

<style>
.videos-admin-header {
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
    gap:15px;
    margin:25px 0;
}
.videos-admin-header h4 { color:#075a9c;font-weight:700; }
.video-admin-card {
    background:white;
    border-radius:14px;
    overflow:hidden;
    margin-bottom:25px;
    box-shadow:0 5px 20px rgba(0,50,100,.09);
}
.video-admin-media {
    position:relative;
    background:#edf3fa;
    aspect-ratio:16/9;
}
.video-admin-media img {
    width:100%;
    height:100%;
    object-fit:cover;
}
.video-admin-content { padding:18px; }
.video-admin-title {
    color:#173b60;
    font-size:17px;
    font-weight:700;
    margin:10px 0;
    overflow-wrap:anywhere;
}
.video-admin-actions {
    display:flex;
    gap:8px;
    flex-wrap:wrap;
    margin-top:15px;
}
.video-admin-actions form { margin:0; }
.video-admin-tag {
    display:inline-block;
    background:#e6f2fc;
    color:#075a9c;
    padding:5px 12px;
    border-radius:20px;
    font-size:12px;
}
</style>

<div class="row">
    <div class="col s12">
        <div class="videos-admin-header">
            <div>
                <h4><i class="fa fa-video-camera"></i> Gestão de Vídeos</h4>
                <p class="grey-text">
                    Vídeos de actividades, aulas, projectos e testemunhos.
                </p>
            </div>

            <a href="{{ route('admin.videos.create') }}"
               class="btn blue">
                <i class="fa fa-plus"></i> Novo Vídeo
            </a>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="row">
        <div class="col s12">
            <div class="card-panel blue lighten-5 blue-text text-darken-4">
                {{ session('success') }}
            </div>
        </div>
    </div>
@endif

<div class="row">

    @forelse($videos as $video)

        <div class="col s12 m6 l4">
            <div class="video-admin-card">

                <div class="video-admin-media">
                    @if($video->imagem_capa)
                        <img
                            src="{{ asset('media/videos/' . $video->imagem_capa) }}"
                            alt="{{ $video->titulo }}"
                            loading="lazy"
                        >
                    @else
                        <div style="height:100%;display:flex;align-items:center;justify-content:center;">
                            <i class="fa fa-play-circle fa-4x blue-text"></i>
                        </div>
                    @endif
                </div>

                <div class="video-admin-content">

                    <span class="video-admin-tag">
                        {{ ucfirst($video->categoria) }}
                    </span>

                    <p class="video-admin-title">
                        {{ $video->titulo }}
                    </p>

                    <p class="grey-text">
                        {{ \Illuminate\Support\Str::limit($video->descricao, 90) }}
                    </p>

                    <p>
                        @if($video->publicado)
                            <span class="green-text text-darken-2">
                                <i class="fa fa-check-circle"></i> Publicado
                            </span>
                        @else
                            <span class="orange-text text-darken-3">
                                <i class="fa fa-eye-slash"></i> Oculto
                            </span>
                        @endif
                    </p>

                    <div class="video-admin-actions">

                        <a
                            href="{{ $video->url_video }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="btn blue btn-small"
                            title="Visualizar vídeo"
                        >
                            <i class="fa fa-eye"></i>
                        </a>

                        <a
                            href="{{ route('admin.videos.edit', $video->id) }}"
                            class="btn orange btn-small"
                            title="Editar vídeo"
                        >
                            <i class="fa fa-edit"></i>
                        </a>

                        <form
                            action="{{ route('admin.videos.destroy', $video->id) }}"
                            method="POST"
                            onsubmit="return confirm('Deseja realmente eliminar este vídeo?');"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn red btn-small"
                                title="Eliminar vídeo"
                            >
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>

                    </div>

                </div>
            </div>
        </div>

    @empty

        <div class="col s12">
            <div class="card-panel center-align" style="padding:45px;">
                <i class="fa fa-video-camera fa-3x blue-text"></i>
                <h5>Ainda não existem vídeos registados.</h5>
                <p>Comece por publicar um vídeo das actividades da Rede Eiffel.</p>

                <a href="{{ route('admin.videos.create') }}"
                   class="btn blue">
                    Adicionar Primeiro Vídeo
                </a>
            </div>
        </div>

    @endforelse

</div>

<div class="row">
    <div class="col s12 center-align">
        {{ $videos->links() }}
    </div>
</div>

@endsection
