document.addEventListener('DOMContentLoaded', function () {
  const root=document.getElementById('eiffel-assistant'); if(!root)return;
  const el=id=>document.getElementById(id);
  const panel=el('eiffel-bot-panel'), toggle=el('eiffel-bot-toggle'), restore=el('eiffel-restore'), mascot=el('eiffel-mascot');
  const lang=el('eiffel-bot-lang'), messages=el('eiffel-bot-messages'), suggestions=el('eiffel-bot-suggestions'), input=el('eiffel-bot-input');
  const translations={
    pt:{welcome:'Olá! Sou o Assistente Eiffel. Posso ajudar com informações sobre a Rede Eiffel, os liceus e os contactos. O que gostaria de saber?',questions:['O que é a Rede Eiffel?','Quais são os liceus?','Como contactar?'],answers:['A Rede Eiffel é uma rede de liceus em Angola dedicada à educação e à formação dos estudantes.','A Rede Eiffel tem liceus em diferentes localidades de Angola, incluindo Ondjiva, Luena, Huambo, Malanje, Ndalatando e Dande.','Consulte a secção de contactos deste site para obter informações oficiais.'],unknown:'Ainda não tenho uma resposta específica. Consulte as informações e os contactos oficiais do site.',placeholder:'Escreva a sua pergunta...'},
    en:{welcome:'Hello! I am the Eiffel Assistant. I can help with information about Rede Eiffel, its schools and contacts. What would you like to know?',questions:['What is Rede Eiffel?','Where are the schools?','How can I contact you?'],answers:['Rede Eiffel is a network of secondary schools in Angola dedicated to education and student development.','Rede Eiffel has schools in several locations in Angola, including Ondjiva, Luena, Huambo, Malanje, Ndalatando and Dande.','Please visit the contact section of this website for official information.'],unknown:'I do not have a specific answer yet. Please check the official information and contact details on this website.',placeholder:'Type your question...'},
    fr:{welcome:'Bonjour ! Je suis l’Assistant Eiffel. Je peux vous renseigner sur le Réseau Eiffel, les lycées et les contacts. Que souhaitez-vous savoir ?',questions:['Qu’est-ce que le Réseau Eiffel ?','Où sont les lycées ?','Comment vous contacter ?'],answers:['Le Réseau Eiffel est un réseau de lycées en Angola consacré à l’éducation et à la formation des élèves.','Le Réseau Eiffel possède des lycées dans plusieurs localités angolaises, notamment Ondjiva, Luena, Huambo, Malanje, Ndalatando et Dande.','Veuillez consulter la rubrique Contacts du site pour obtenir des informations officielles.'],unknown:'Je ne dispose pas encore d’une réponse précise. Veuillez consulter les informations et les contacts officiels du site.',placeholder:'Écrivez votre question...'}
  };
  const norm=s=>s.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g,'').replace(/[^\p{L}\p{N}\s]/gu,'').trim();
  function addMessage(value,who){const item=document.createElement('div');item.className='eiffel-bot-message '+who;item.textContent=value;messages.appendChild(item);messages.scrollTop=messages.scrollHeight;}
  function answer(q){const d=translations[lang.value];const n=norm(q);let index=d.questions.findIndex(x=>norm(x)===n);if(index<0){const words=n.split(/\s+/);if(words.some(w=>['contacto','contactos','contact','contacter','telefone','email'].includes(w)))index=2;else if(words.some(w=>['liceu','liceus','escola','escolas','schools','school','lycees','lycee'].includes(w)))index=1;else if(n.includes('rede eiffel')||n.includes('reseau eiffel'))index=0;}addMessage(q,'user');addMessage(index>=0?d.answers[index]:d.unknown,'bot');}
  function render(){const d=translations[lang.value];messages.replaceChildren();suggestions.replaceChildren();input.placeholder=d.placeholder;addMessage(d.welcome,'bot');d.questions.forEach(q=>{const b=document.createElement('button');b.type='button';b.textContent=q;b.addEventListener('click',()=>answer(q));suggestions.appendChild(b);});}
  function openChat(){root.classList.add('is-open');panel.hidden=false;toggle.setAttribute('aria-expanded','true');input.focus();}
  function closeChat(){root.classList.remove('is-open');panel.hidden=true;toggle.setAttribute('aria-expanded','false');toggle.focus();}
  toggle.addEventListener('click',()=>panel.hidden?openChat():closeChat());
  el('eiffel-minimize').addEventListener('click',closeChat);
  el('eiffel-bot-close').addEventListener('click',closeChat);
  el('eiffel-expand').addEventListener('click',function(){const expanded=panel.classList.toggle('is-expanded');this.setAttribute('aria-pressed',String(expanded));this.title=expanded?'Reduzir':'Expandir';});
  el('eiffel-hide').addEventListener('click',()=>{closeChat();mascot.hidden=true;restore.hidden=false;root.classList.remove('is-walking');});
  restore.addEventListener('click',()=>{restore.hidden=true;mascot.hidden=false;root.classList.add('is-walking');toggle.focus();});
  el('eiffel-walk-toggle').addEventListener('click',function(){const paused=root.classList.toggle('is-paused');root.classList.toggle('is-walking',!paused);this.textContent=paused?'▶':'Ⅱ';this.title=paused?'Retomar movimento':'Pausar movimento';this.setAttribute('aria-label',this.title);});
  lang.addEventListener('change',render);
  el('eiffel-bot-form').addEventListener('submit',e=>{e.preventDefault();const q=input.value.trim();if(!q)return;answer(q);input.value='';input.focus();});
  document.addEventListener('keydown',e=>{if(e.key==='Escape'&&!panel.hidden)closeChat();});
  if(!window.matchMedia('(prefers-reduced-motion: reduce)').matches)root.classList.add('is-walking');
  render();
});
