<style>
.eiffel-projectos{padding:55px 0 70px;background:linear-gradient(180deg,#f3f7fd 0%,#fff 100%)}
.eiffel-projectos .titulo-seccao{color:#103c73;font-size:30px;font-weight:700;margin-bottom:12px}
.eiffel-projectos .subtitulo{color:#5d6d7e;margin-bottom:35px}
.eiffel-projectos .projecto-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:25px}
.eiffel-projectos .projecto-card{background:#fff;border-radius:14px;overflow:hidden;box-shadow:0 6px 24px rgba(16,60,115,.10);border-bottom:4px solid #f3c432;transition:transform .25s,box-shadow .25s}
.eiffel-projectos .projecto-card:hover{transform:translateY(-5px);box-shadow:0 12px 30px rgba(16,60,115,.17)}
.eiffel-projectos .projecto-foto{width:100%;height:230px;object-fit:cover;display:block}
.eiffel-projectos .projecto-sem-foto{height:230px;display:flex;justify-content:center;align-items:center;background:#e8f0fa;color:#103c73;font-size:45px}
.eiffel-projectos .projecto-conteudo{padding:24px}
.eiffel-projectos .projecto-conteudo h5{color:#103c73;font-size:21px;font-weight:700;line-height:1.4;margin-top:0}
.eiffel-projectos .projecto-meta{color:#60758c;font-size:13px;margin:12px 0;display:flex;flex-wrap:wrap;gap:8px 16px}
.eiffel-projectos .projecto-descricao{color:#425466;line-height:1.75;white-space:pre-line;overflow-wrap:anywhere}
@media(max-width:992px){.eiffel-projectos .projecto-grid{grid-template-columns:repeat(2,minmax(0,1fr))}}
@media(max-width:600px){.eiffel-projectos .projecto-grid{grid-template-columns:1fr}.eiffel-projectos .titulo-seccao{font-size:25px}}
</style>
<section class="eiffel-projectos">
  <div class="container">
    <h4 class="titulo-seccao">{{ $tituloGaleria ?? 'Projectos da Rede Eiffel' }}</h4>
    <div class="borda-titulo-0"></div>
    <p class="subtitulo">{{ $subtituloGaleria ?? 'Conheça as iniciativas desenvolvidas pelos nossos liceus.' }}</p>
    @if($projectos->isNotEmpty())
      <div class="projecto-grid">
        @foreach($projectos as $projecto)
          <article class="projecto-card">
            @if($projecto->fotografia)
              <img src="{{ asset('storage/' . $projecto->fotografia) }}" class="projecto-foto" alt="{{ $projecto->titulo }}" loading="lazy">
            @else
              <div class="projecto-sem-foto"><i class="fa fa-lightbulb"></i></div>
            @endif
            <div class="projecto-conteudo">
              <h5>{{ $projecto->titulo }}</h5>
              <div class="projecto-meta">
                @if($projecto->liceu)
                  <span><i class="fa fa-school"></i> {{ $projecto->liceu }}</span>
                @endif
                @if($projecto->data_projecto)
                  <span><i class="fa fa-calendar-alt"></i> {{ $projecto->data_projecto->format('d/m/Y') }}</span>
                @endif
              </div>
              <p class="projecto-descricao">{{ $projecto->descricao }}</p>
            </div>
          </article>
        @endforeach
      </div>
    @else
      <p class="grey-text">Ainda não existem projectos publicados nesta categoria.</p>
    @endif
  </div>
</section>
