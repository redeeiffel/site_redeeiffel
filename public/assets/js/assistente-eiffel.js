document.addEventListener('DOMContentLoaded', function () {
  const root = document.getElementById('eiffel-assistant');
  if (!root) return;

  const el = id => document.getElementById(id);

  const panel = el('eiffel-bot-panel');
  const toggle = el('eiffel-bot-toggle');
  const restore = el('eiffel-restore');
  const mascot = el('eiffel-mascot');
  const lang = el('eiffel-bot-lang');
  const messages = el('eiffel-bot-messages');
  const suggestions = el('eiffel-bot-suggestions');
  const input = el('eiffel-bot-input');
  const form = el('eiffel-bot-form');
  const submitButton = form.querySelector('button[type="submit"]');

  const endpoint = '/api/assistente/perguntar';

  let pending = false;
  let requestVersion = 0;

  const translations = {
    pt: {
      welcome: 'Olá! Sou o Assistente Eiffel. Posso ajudar com informações públicas sobre a Rede Eiffel. O que gostaria de saber?',
      questions: [
        'Quem é o Director Geral da Coordenação Nacional?',
        'Quais são os liceus da Rede Eiffel?',
        'Como posso contactar a Rede Eiffel?'
      ],
      placeholder: 'Escreva a sua pergunta...',
      error: 'Não foi possível comunicar com o assistente neste momento. Por favor, tente novamente.',
      unavailable: 'Essa informação ainda não foi disponibilizada no site da Rede Eiffel.',
      waiting: 'A obter resposta...',
      source: 'Consultar fonte'
    },
    en: {
      welcome: 'Hello! I am the Eiffel Assistant. I can help with public information about Rede Eiffel. What would you like to know?',
      questions: [
        'Who is the General Director of the National Coordination?',
        'Which schools belong to Rede Eiffel?',
        'How can I contact Rede Eiffel?'
      ],
      placeholder: 'Type your question...',
      error: 'Unable to contact the assistant right now. Please try again.',
      unavailable: 'This information has not yet been made available on the Rede Eiffel website.',
      waiting: 'Getting a response...',
      source: 'View source'
    },
    fr: {
      welcome: 'Bonjour ! Je suis l’Assistant Eiffel. Je peux vous renseigner sur les informations publiques du Réseau Eiffel. Que souhaitez-vous savoir ?',
      questions: [
        'Qui est le Directeur Général de la Coordination Nationale ?',
        'Quels sont les lycées du Réseau Eiffel ?',
        'Comment contacter le Réseau Eiffel ?'
      ],
      placeholder: 'Écrivez votre question...',
      error: 'Impossible de contacter l’assistant pour le moment. Veuillez réessayer.',
      unavailable: "Cette information n'a pas encore été publiée sur le site du Réseau Eiffel.",
      waiting: 'Recherche de la réponse...',
      source: 'Consulter la source'
    }
  };

  function addMessage(value, who) {
    const item = document.createElement('div');
    item.className = 'eiffel-bot-message ' + who;
    item.textContent = value;
    messages.appendChild(item);
    messages.scrollTop = messages.scrollHeight;
    return item;
  }

  function addSources(fontes, idioma) {
    if (!Array.isArray(fontes)) return;

    fontes.forEach(fonte => {
      if (!fonte || typeof fonte.url !== 'string') return;

      let url;

      try {
        url = new URL(fonte.url, window.location.origin);
      } catch (_) {
        return;
      }

      if (!['http:', 'https:'].includes(url.protocol)) return;
      if (url.origin !== window.location.origin) return;

      const item = document.createElement('div');
      item.className = 'eiffel-bot-message bot';

      const link = document.createElement('a');
      link.href = url.href;
      link.target = '_blank';
      link.rel = 'noopener noreferrer';
      link.textContent = fonte.titulo || translations[idioma].source;

      item.appendChild(link);
      messages.appendChild(item);
    });

    messages.scrollTop = messages.scrollHeight;
  }

  function setPending(value) {
    pending = value;
    input.disabled = value;
    submitButton.disabled = value;

    suggestions.querySelectorAll('button').forEach(button => {
      button.disabled = value;
    });
  }

  async function answer(question) {
    if (pending) return;

    const idioma = lang.value;
    const d = translations[idioma];

    addMessage(question, 'user');

    setPending(true);

    const version = ++requestVersion;
    const waitingMessage = addMessage(d.waiting, 'bot');

    try {
      const response = await fetch(endpoint, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json'
        },
        body: JSON.stringify({
          pergunta: question,
          idioma: idioma
        })
      });

      if (!response.ok) {
        throw new Error('HTTP ' + response.status);
      }

      const data = await response.json();

      if (version !== requestVersion) return;

      if (!data || typeof data.resposta !== 'string') {
        throw new Error('Resposta inválida');
      }

      waitingMessage.textContent = data.resposta || d.unavailable;

      if (data.encontrado === true) {
        addSources(data.fontes, idioma);
      }

    } catch (error) {
      console.error('Assistente Eiffel:', error);

      if (version === requestVersion) {
        waitingMessage.textContent = d.error;
      }
    } finally {
      if (version === requestVersion) {
        setPending(false);
        messages.scrollTop = messages.scrollHeight;
      }
    }
  }

  function render() {
    requestVersion++;

    messages.replaceChildren();
    suggestions.replaceChildren();

    const d = translations[lang.value];

    input.placeholder = d.placeholder;
    addMessage(d.welcome, 'bot');

    d.questions.forEach(question => {
      const button = document.createElement('button');
      button.type = 'button';
      button.textContent = question;

      button.addEventListener('click', () => {
        answer(question);
      });

      button.disabled = pending;
      suggestions.appendChild(button);
    });
  }

  function openChat() {
    root.classList.add('is-open');
    panel.hidden = false;
    toggle.setAttribute('aria-expanded', 'true');
    input.focus();
  }

  function closeChat() {
    root.classList.remove('is-open');
    panel.hidden = true;
    toggle.setAttribute('aria-expanded', 'false');
    toggle.focus();
  }

  toggle.addEventListener('click', () => {
    panel.hidden ? openChat() : closeChat();
  });

  el('eiffel-minimize').addEventListener('click', closeChat);
  el('eiffel-bot-close').addEventListener('click', closeChat);

  el('eiffel-expand').addEventListener('click', function () {
    const expanded = panel.classList.toggle('is-expanded');
    this.setAttribute('aria-pressed', String(expanded));
    this.title = expanded ? 'Reduzir' : 'Expandir';
  });

  el('eiffel-hide').addEventListener('click', () => {
    closeChat();
    mascot.hidden = true;
    restore.hidden = false;
    root.classList.remove('is-walking');
  });

  restore.addEventListener('click', () => {
    restore.hidden = true;
    mascot.hidden = false;
    root.classList.add('is-walking');
    toggle.focus();
  });

  el('eiffel-walk-toggle').addEventListener('click', function () {
    const paused = root.classList.toggle('is-paused');
    root.classList.toggle('is-walking', !paused);
    this.textContent = paused ? '▶' : 'Ⅱ';
    this.title = paused ? 'Retomar movimento' : 'Pausar movimento';
    this.setAttribute('aria-label', this.title);
  });

  lang.addEventListener('change', function () {
    if (pending) {
      lang.value = lang.dataset.previous || 'pt';
      return;
    }

    lang.dataset.previous = lang.value;
    render();
  });

  lang.dataset.previous = lang.value;

  form.addEventListener('submit', event => {
    event.preventDefault();

    const question = input.value.trim();

    if (!question || pending) return;

    answer(question);
    input.value = '';
    input.focus();
  });

  document.addEventListener('keydown', event => {
    if (event.key === 'Escape' && !panel.hidden) {
      closeChat();
    }
  });

  if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    root.classList.add('is-walking');
  }

  render();
});