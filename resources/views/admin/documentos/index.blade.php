@extends('layouts.main_admin')

@section('content')
<style>
.documentos-admin{padding:25px 15px 55px;background:#f5f8fc;min-height:80vh;color:#263a52}
.documentos-admin .doc-container{max-width:1250px;margin:auto}
.documentos-admin .doc-header{background:linear-gradient(120deg,#102f57,#1769b3);color:#fff;padding:30px;border-radius:15px;margin-bottom:25px}
.documentos-admin .doc-header h2{color:#fff;font-size:27px;font-weight:800;margin:0 0 10px}
.documentos-admin .doc-header p{margin:0;color:#e4efff}
.documentos-admin .doc-card{background:#fff;border:1px solid #e0e8f3;border-radius:14px;padding:25px;margin-bottom:25px;box-shadow:0 5px 20px rgba(0,0,0,.04)}
.documentos-admin .doc-card h3{font-size:20px;font-weight:700;color:#123d70;margin:0 0 20px}
.documentos-admin .doc-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:18px}
.documentos-admin .doc-field{display:flex;flex-direction:column;gap:7px;min-width:0}
.documentos-admin .doc-field.full{grid-column:1/-1}
.documentos-admin .doc-field label{font-size:13px;font-weight:700;color:#344c68}
.documentos-admin .doc-field input:not([type=checkbox]),.documentos-admin .doc-field select.browser-default,.documentos-admin .doc-field textarea{display:block!important;visibility:visible!important;opacity:1!important;position:static!important;width:100%!important;box-sizing:border-box!important;border:1px solid #d8e3f0!important;border-radius:8px!important;padding:12px!important;background:#fff!important;color:#263a52!important;font-size:14px!important;height:auto!important;min-height:45px!important;box-shadow:none!important;margin:0!important}
.documentos-admin .doc-field select.browser-default{appearance:auto!important;-webkit-appearance:menulist!important;cursor:pointer}
.documentos-admin .doc-field textarea{min-height:90px!important;resize:vertical}
.documentos-admin .doc-btn{display:inline-flex;align-items:center;justify-content:center;gap:7px;border:0;border-radius:8px;padding:11px 17px;font-size:13px;font-weight:700;text-decoration:none;cursor:pointer;height:auto;line-height:1.4;text-transform:none}
.documentos-admin .doc-btn-primary{background:#1769b3;color:#fff}
.documentos-admin .doc-btn-secondary{background:#e9f2fc;color:#15538b}
.documentos-admin .doc-btn-danger{background:#fff0f0;color:#b72b2b}
.documentos-admin .doc-btn-warning{background:#fff4d8;color:#875e00}
.documentos-admin .doc-actions{display:flex;gap:8px;flex-wrap:wrap;align-items:center}
.documentos-admin .doc-actions form{margin:0}
.documentos-admin .doc-status{display:inline-block;padding:5px 10px;border-radius:20px;font-size:12px;font-weight:700}
.documentos-admin .doc-status.active{background:#e6f7ec;color:#217343}
.documentos-admin .doc-status.inactive{background:#fff0e8;color:#a94b1b}
.documentos-admin .doc-edit{margin-top:15px;padding:20px;border-radius:10px;background:#f7faff;border:1px solid #dfe9f5}
.documentos-admin .doc-edit summary{cursor:pointer;color:#1769b3;font-weight:700}
.documentos-admin .doc-message{padding:14px 18px;border-radius:8px;margin-bottom:20px}
.documentos-admin .doc-success{background:#e7f7ee;color:#17663b}
.documentos-admin .doc-error{background:#fff0f0;color:#a52a2a}
.documentos-admin .doc-help{color:#73849a;font-size:12px;line-height:1.5}
@media(max-width:768px){.documentos-admin .doc-grid{grid-template-columns:1fr}.documentos-admin .doc-header{padding:23px}.documentos-admin .doc-card{padding:18px}}
</style>

<div class="documentos-admin"><div class="doc-container">
  <div class="doc-header"><h2><i class="fa fa-file-pdf"></i> Gestão de Documentos</h2><p>Publique documentos oficiais e actualize os calendários escolares da Rede Eiffel.</p></div>

  @if(session('success'))<div class="doc-message doc-success">{{ session('success') }}</div>@endif
  @if(session('fail'))<div class="doc-message doc-error">{{ session('fail') }}</div>@endif
  @if(isset($errors) && $errors->any())
    <div class="doc-message doc-error"><strong>Verifique os seguintes erros:</strong><ul>@foreach($errors->all() as $erro)<li>{{ $erro }}</li>@endforeach</ul></div>
  @endif

  <div class="doc-card">
    <h3><i class="fa fa-plus-circle"></i> Publicar Novo Documento</h3>
    <form action="{{ route('admin.documentos.guardar') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="doc-grid">
        <div class="doc-field full"><label for="doc-titulo">Nome do documento *</label><input type="text" id="doc-titulo" name="titulo" value="{{ old('titulo') }}" placeholder="Ex.: Calendário Escolar Nacional 2026/2027" maxlength="255" required></div>
        <div class="doc-field"><label for="doc-categoria">Categoria *</label>
          <select class="browser-default" id="doc-categoria" name="categoria" required>
            @foreach(['calendarios'=>'Calendários','regulamentos'=>'Regulamentos','comunicados'=>'Comunicados','orientacoes'=>'Orientações','outros'=>'Outros documentos'] as $valor=>$nome)
              <option value="{{ $valor }}" @selected(old('categoria','outros') === $valor)>{{ $nome }}</option>
            @endforeach
          </select>
        </div>
        <div class="doc-field"><label for="doc-tipo">Tipo de calendário</label>
          <select class="browser-default" id="doc-tipo" name="tipo_calendario">
            <option value="">Não é um calendário principal</option>
            <option value="nacional" @selected(old('tipo_calendario') === 'nacional')>Calendário Escolar Nacional</option>
            <option value="coordenacao" @selected(old('tipo_calendario') === 'coordenacao')>Calendário da Coordenação</option>
          </select>
          <small class="doc-help">Seleccione um tipo apenas para os dois calendários principais do menu do site. Cada tipo só pode ter um registo.</small>
        </div>
        <div class="doc-field"><label for="doc-ano">Ano lectivo</label><input type="text" id="doc-ano" name="ano_letivo" value="{{ old('ano_letivo') }}" placeholder="Ex.: 2026/2027" maxlength="20"></div>
        <div class="doc-field"><label for="doc-ordem">Ordem de apresentação</label><input type="number" id="doc-ordem" name="ordem" value="{{ old('ordem',0) }}" min="0"></div>
        <div class="doc-field full"><label for="doc-descricao">Descrição</label><textarea id="doc-descricao" name="descricao" placeholder="Escreva uma breve descrição...">{{ old('descricao') }}</textarea></div>
        <div class="doc-field full"><label for="doc-ficheiro">Ficheiro PDF *</label><input type="file" id="doc-ficheiro" name="ficheiro" accept=".pdf,application/pdf" required><small class="doc-help">Formato permitido: PDF. Tamanho máximo: 20 MB, sujeito à configuração do servidor.</small></div>
      </div>
      <div style="margin-top:22px"><button type="submit" class="doc-btn doc-btn-primary"><i class="fa fa-upload"></i> Publicar Documento</button></div>
    </form>
  </div>

  <div class="doc-card">
    <h3><i class="fa fa-folder-open"></i> Documentos Publicados ({{ $documentos->count() }})</h3>
    @forelse($documentos as $documento)
      <div style="border-bottom:1px solid #e6edf5;padding:20px 0">
        <div class="doc-grid">
          <div>
            <strong style="color:#123d70;font-size:16px">{{ $documento->titulo }}</strong>
            <p style="margin:8px 0;color:#73849a;font-size:13px">Categoria: {{ ucfirst($documento->categoria) }} @if($documento->ano_letivo) | Ano: {{ $documento->ano_letivo }} @endif</p>
            @if($documento->tipo_calendario)<p style="font-size:12px;color:#1769b3">Calendário principal: {{ ucfirst($documento->tipo_calendario) }}</p>@endif
            <span class="doc-status {{ $documento->ativo ? 'active' : 'inactive' }}">{{ $documento->ativo ? 'Publicado' : 'Desactivado' }}</span>
          </div>
          <div class="doc-actions">
            @if($documento->ativo)
              <a href="{{ route('documentos.visualizar',$documento) }}" target="_blank" rel="noopener noreferrer" class="doc-btn doc-btn-secondary"><i class="fa fa-eye"></i> Abrir</a>
              <a href="{{ route('documentos.baixar',$documento) }}" class="doc-btn doc-btn-secondary"><i class="fa fa-download"></i> Baixar</a>
            @endif
            <form action="{{ route('admin.documentos.estado',$documento) }}" method="POST">@csrf @method('PATCH')<button type="submit" class="doc-btn doc-btn-warning">{{ $documento->ativo ? 'Desactivar' : 'Activar' }}</button></form>
            <form action="{{ route('admin.documentos.eliminar',$documento) }}" method="POST" onsubmit="return confirm('Tem a certeza de que pretende eliminar este documento?');">@csrf @method('DELETE')<button type="submit" class="doc-btn doc-btn-danger"><i class="fa fa-trash"></i> Eliminar</button></form>
          </div>
        </div>
        <details class="doc-edit">
          <summary><i class="fa fa-edit"></i> Editar ou substituir ficheiro</summary>
          <form action="{{ route('admin.documentos.atualizar',$documento) }}" method="POST" enctype="multipart/form-data" style="margin-top:20px">
            @csrf @method('PUT')
            <div class="doc-grid">
              <div class="doc-field full"><label>Nome do documento</label><input type="text" name="titulo" value="{{ $documento->titulo }}" required></div>
              <div class="doc-field"><label>Categoria</label><select class="browser-default" name="categoria" required>@foreach(['calendarios'=>'Calendários','regulamentos'=>'Regulamentos','comunicados'=>'Comunicados','orientacoes'=>'Orientações','outros'=>'Outros documentos'] as $valor=>$nome)<option value="{{ $valor }}" @selected($documento->categoria === $valor)>{{ $nome }}</option>@endforeach</select></div>
              <div class="doc-field"><label>Tipo de calendário</label><select class="browser-default" name="tipo_calendario"><option value="">Não é um calendário principal</option><option value="nacional" @selected($documento->tipo_calendario === 'nacional')>Calendário Escolar Nacional</option><option value="coordenacao" @selected($documento->tipo_calendario === 'coordenacao')>Calendário da Coordenação</option></select><small class="doc-help">A alteração deste campo também precisa de ser aceite pelo método atualizar do controlador.</small></div>
              <div class="doc-field"><label>Ano lectivo</label><input type="text" name="ano_letivo" value="{{ $documento->ano_letivo }}" maxlength="20"></div>
              <div class="doc-field"><label>Ordem</label><input type="number" name="ordem" value="{{ $documento->ordem }}" min="0"></div>
              <div class="doc-field full"><label>Descrição</label><textarea name="descricao">{{ $documento->descricao }}</textarea></div>
              <div class="doc-field full"><label>Substituir PDF</label><input type="file" name="ficheiro" accept=".pdf,application/pdf"><small class="doc-help">Deixe vazio para manter o ficheiro actual.</small></div>
            </div>
            <div style="margin-top:20px"><button type="submit" class="doc-btn doc-btn-primary"><i class="fa fa-save"></i> Guardar Alterações</button></div>
          </form>
        </details>
      </div>
    @empty
      <p style="text-align:center;padding:40px 0;color:#71839a">Ainda não existem documentos publicados.</p>
    @endforelse
  </div>
</div></div>
@endsection
