<footer class="page-footer footer-eiffel" aria-label="Rodapé da Rede Eiffel">
    <div class="footer-eiffel-newsletter">
        <div class="container">
            <div class="footer-eiffel-newsletter-grid">
                <div class="footer-eiffel-apresentacao">
                    <a href="{{ route('welcome') }}" aria-label="Rede Eiffel — página inicial" class="footer-eiffel-marca">
                        <img src="{{ asset('assets/img/logo.jpeg') }}" alt="Logótipo da Rede Eiffel" class="footer-eiffel-logo" loading="lazy">
                    </a>
                    <div>
                        <span class="footer-eiffel-etiqueta">Educação, ciência e futuro</span>
                        <h2>Uma rede de oportunidades.</h2>
                        <p>A Rede Eiffel é uma rede de liceus científicos públicos gratuitos, criada através de uma parceria estabelecida em 23 de Maio de 2008 entre o Governo angolano, a TotalEnergies e a Missão Laica Francesa.</p>
                    </div>
                </div>
                <div class="footer-eiffel-subscricao">
                    <div class="footer-eiffel-subscricao-icone" aria-hidden="true"><i class="far fa-envelope"></i></div>
                    <h3>Receba as nossas novidades</h3>
                    <p>Subscreva para acompanhar as actividades e notícias da Rede Eiffel.</p>
                    <form action="{{ route('new_latter') }}" method="POST" class="footer-eiffel-form">
                        @csrf
                        <label class="footer-eiffel-label" for="footer-email">Endereço de email</label>
                        <div class="footer-eiffel-form-campos">
                            <input id="footer-email" type="email" name="email" class="browser-default estilo-input" placeholder="O seu endereço de email" maxlength="50" autocomplete="email" required>
                            <button type="submit" class="footer-eiffel-submit"><i class="bi bi-send" aria-hidden="true"></i><span>Subscrever</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-eiffel-principal">
        <div class="container">
            <div class="row footer-eiffel-colunas">
                <div class="col s12 m6 l3">
                    <h3>Links úteis</h3>
                    <ul>
                        <li><a href="{{ route('welcome') }}">Início</a></li>
                        <li><a href="{{ route('sobre') }}">Apresentação da Rede</a></li>
                        <li><a href="{{ route('fale_conosco') }}">Contacte-nos</a></li>
                    </ul>
                </div>
                <div class="col s12 m6 l3">
                    <h3>Mais informações</h3>
                    <ul>
                        <li><a href="{{ route('projecto_educacional') }}">Projecto Educativo</a></li>
                        <li><a href="{{ route('organizacao_educaional') }}">Vida Escolar</a></li>
                        <li><a href="{{ route('inscricoes') }}">Inscrições</a></li>
                    </ul>
                </div>
                <div class="col s12 m6 l3">
                    <h3>Localização e contactos</h3>
                    <address class="footer-eiffel-contactos">
                        <p><i class="fa fa-map-marker-alt" aria-hidden="true"></i><span>Benguela - Baía Farta</span></p>
                        <p><i class="fa fa-phone" aria-hidden="true"></i><span>Coordenação: <a href="tel:+244227210460">(+244) 227 210 460</a></span></p>
                        <p><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:redeeiffel@redeeiffel.ao">redeeiffel@redeeiffel.ao</a></p>
                    </address>
                </div>
                <div class="col s12 m6 l3">
                    <h3>Redes sociais</h3>
                    <p class="footer-eiffel-redes-texto">Acompanhe as nossas actividades e novidades.</p>
                    <div class="footer-eiffel-redes">
                        <a href="https://www.facebook.com/profile.html?id=100082984706560&amp;_rdc=2&amp;_rdr" target="_blank" rel="noopener noreferrer" aria-label="Facebook da Rede Eiffel (abre noutra janela)"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                        <a href="https://www.instagram.com/?fbclid=IwAR1w6vE_uweEbBlaybvkl6bwMMuw5jg-i-oUtFt_D5W-T8bmFL-XZXE7hHI" target="_blank" rel="noopener noreferrer" aria-label="Instagram da Rede Eiffel (abre noutra janela)"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-copyright footer-eiffel-copyright">
        <div class="container footer-eiffel-copyright-conteudo">
            <span>&copy; {{ date('Y') }} Rede Eiffel Angola. Todos os direitos reservados.</span>
            <span>Educação para o futuro.</span>
        </div>
    </div>
</footer>
