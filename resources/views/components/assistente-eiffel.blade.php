<div id="eiffel-assistant" class="eiffel-assistant" data-mode="normal">
  <div id="eiffel-mascot" class="eiffel-mascot">
    <button id="eiffel-bot-toggle" class="eiffel-bot-toggle" type="button" aria-label="Abrir conversa com o assistente Eiffel" aria-controls="eiffel-bot-panel" aria-expanded="false">
      <img src="{{ asset('assets/images/assistente-eiffel-animado.gif') }}" alt="Robô assistente da Rede Eiffel" draggable="false">
      <span class="eiffel-bot-bubble">Olá! Precisa de ajuda?</span>
    </button>
    <div class="eiffel-mascot-actions">
      <button id="eiffel-walk-toggle" type="button" aria-label="Pausar movimento" title="Pausar movimento">Ⅱ</button>
      <button id="eiffel-hide" type="button" aria-label="Ocultar robô" title="Ocultar robô">×</button>
    </div>
  </div>
  <button id="eiffel-restore" type="button" hidden aria-label="Mostrar assistente Eiffel">Ajuda</button>
  <section id="eiffel-bot-panel" class="eiffel-bot-panel" role="dialog" aria-label="Assistente virtual Rede Eiffel" hidden>
    <header class="eiffel-bot-header">
      <div class="eiffel-heading"><span aria-hidden="true">🎓</span><div><strong>Assistente Eiffel</strong><small>Rede Eiffel · Informação e apoio</small></div></div>
      <div class="eiffel-window-actions">
        <button id="eiffel-minimize" type="button" aria-label="Minimizar conversa" title="Minimizar">−</button>
        <button id="eiffel-expand" type="button" aria-label="Expandir conversa" aria-pressed="false" title="Expandir">⛶</button>
        <button id="eiffel-bot-close" type="button" aria-label="Fechar conversa" title="Fechar">×</button>
      </div>
    </header>
    <div class="eiffel-bot-language"><label for="eiffel-bot-lang">Idioma</label><select id="eiffel-bot-lang" class="browser-default"><option value="pt">Português</option><option value="en">English</option><option value="fr">Français</option></select></div>
    <div id="eiffel-bot-messages" class="eiffel-bot-messages" role="log" aria-live="polite"></div>
    <div id="eiffel-bot-suggestions" class="eiffel-bot-suggestions"></div>
    <form id="eiffel-bot-form" class="eiffel-bot-form"><input id="eiffel-bot-input" type="text" maxlength="300" autocomplete="off" aria-label="Escrever mensagem" placeholder="Escreva a sua pergunta..." required><button type="submit" aria-label="Enviar mensagem">➤</button></form>
  </section>
</div>
<link rel="stylesheet" href="{{ asset('assets/css/assistente-eiffel.css') }}">
<script src="{{ asset('assets/js/assistente-eiffel.js') }}" defer></script>
