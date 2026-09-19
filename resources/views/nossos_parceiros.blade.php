@extends('layouts.main')
@section('content')

<style>
		.p {
			text-align: justify;
		}
	</style>

	<section class="banner-other">
		<div class="container">
			<div class="row">
				<div class="col s12 white-text">
					<h5 class="title center">Nossos Parceiros</h5>
				</div>
			</div>
		</div>
	</section>


	<section>
		<div class="container">
			<div class="row">
				<div class="col s12 m12 l12 pt-5" data-aos="fade-up" data-aos-delay="100">

					<div class="tab">
						<button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Ministério da Educação</button>
						<button class="tablinks" onclick="openCity(event, 'Paris')">TotalEnergies</button>
						<button class="tablinks" onclick="openCity(event, 'Tokyo')">Missão Laica Francesa</button>
						<button class="tablinks" onclick="openCity(event, 'Embaixada')">Embaixada de França em Angola</button>
					</div>

					<div id="London" class="tabcontent">
						<div class="row">
							<div class="col s12 m12 l6">
								<h5 class="">Ministério da Educação</h5>
								<div class="borda-titulo-0"></div>

								<p class="texto-0" style="text-align: justify;">Em primeiro lugar cabe realçar que os liceus são liceus estatais públicos Angolanos sob tutela directa do Ministério da Educação, tendo as seguintes atribuições</p>
								<ul class="texto-0" style="text-align: justify;">
									<li>&#x203A; Assegurar a definição, direcção e coordenação da execução da política educativa através dos seus órgãos e serviços, das instituições de Ensino</li>
									<li>&#x203A; Conceber e propor políticas referentes ao Sector, visando melhorar a qualidade da Educação e Ensino, a valorização do Professor, expansão e consolidação da rede escolar</li>
									<li>&#x203A; Estimular a participação da sociedade civil na implementação de programas do Executivo no domínio da Educação e Ensino</li>
									<li>&#x203A; <a href="https://med.gov.ao/ao/" target="_blank">O Ministério da Educação</a></li>
								</ul>
							</div>
							<div class="col s12 m12 l4">
								<img src="/assets/img/parceiros/images.jpeg" class="responsive-img" alt="">
							</div>
						</div>

					</div>

					<div id="Paris" class="tabcontent">
						<div class="row">
							<div class="col s12 m12 l6">
								<h5 class="">Total Energies</h5>
								<div class="borda-titulo-0"></div>

								<p class="texto-0" style="text-align: justify;">Em segundo lugar, o Projecto é financiado exclusivamente pela Empresa Total. O grupo TOTAL, pela sua filial angolana (TEPA), é o financiador do Projecto e avista um duplo objectivo</p>
								<ul class="texto-0" style="text-align: justify;"> 
									<li>&#x203A; Participar no desenvolvimento de Angola, tendo essencialmente em vista a sua juventude, particularmente uma formação melhorada</li>
									<li>&#x203A; Abrir-se a curto prazo, na possibilidade de recrutamento do pessoal qualificado, permitindo aos melhores da Rede Eiffel continuaremutilmente os seus estudos superiores, pela oferta e disponibilidade de bolsas de estudos</li>
									<li>&#x203A; <a href="https://totalenergies.com/" target="_blank">Total Energies</a></li>
								</ul>
							</div>
							<div class="col s12 m12 l4">
								<img src="/assets/img/parceiros/totalenergies-logo.png" class="responsive-img" alt="">
							</div>
						</div>


					</div>

					<div id="Tokyo" class="tabcontent">
						<div class="row">
							<div class="col s12 m12 l6">
								<h5 class="">Missão Laica Francesa</h5>
								<div class="borda-titulo-0"></div>

								<p class="texto-0" style="text-align: justify;">Em terceiro lugar, a Rede dos liceus Eiffel é dirigida pela Mission Laïque Française cujo projecto pedagógico tem como fundamento o saber-fazer francês em termos educativos e de gestão dos liceus. Baseado em pedagogias ativas e centradas sobre os alunos, o projecto pedagógico favoriza um ensino leigo, intercultural e bilíngue. A instituição coloca a sua expertise os seguintes domínios</p>

								<ul class="texto-0">
									<li>&#x203A; A gestão rigorosa dos Liceus e dos processos pedagógicos</li>
									<li>&#x203A; O conselho quanto à adaptação dos programas de ensino</li>
									<li>&#x203A; A formação do corpo docente e seu enquadramento</li>
									<li>&#x203A; A promoção dos valores humanistas, da laicidade, do diálogo intercultural e de abertura dos espíritos nas novas experiências</li>
									<li>&#x203A; <a href="https://www.mlfmonde.org/" target="_blank">A missão Laica Francesa (MLF)</a></li>
								</ul>
							</div>
							<div class="col s12 m12 l4" style="margin-top: 100px;">
								<img src="/assets/imagens/logo.png" class="responsive-img" alt="">
							</div>
						</div>


					</div>


					<div id="Embaixada" class="tabcontent">
						<div class="row">
							<div class="col s12 m12 l6">
								<h5 class="" style="text-align: justify;">Embaixada de França em Angola</h5>
								<div class="borda-titulo-0"></div>

								<p class="texto-0">Finalmente, parceiro do projecto desde 2017, a embaixada da França em Angola, traz o seu suporte e a sua dinâmica para favorecer o ensino bilíngue nos liceus da Rede Eiffel, a radiação da francofonia nas províncias e um apoio consequente na formação docente. Importa, pois, referir que é neste domínio de parceria estratégica e de diplomacia educacional que muitas acções comuns foram organizadas com o serviçocultural da Embaixada da França (acções culturais e de formação dos professores em pedagogia de projecto). Podemos dizer ainda que embora os liceus Eiffel ofereçam formações em ciências físicas e biológicas, eles conseguiram brilhar nos domínios culturais do espaço francófono em Angola, tendo inscrito os seus professores de Língua Francesa (como formadores nacionais de professores de língua francesa, numa parceria com o Ministério da Educação (INFQE e o BELFA), a Embaixada de França em Angola e a AEFA. Portanto, é missão pedagógica da Rede Eiffel em Angola</p>

								<ul class="texto-0">
									<li>&#x203A; Formar alunos com um padrão educativo aceite em qualquer sociedade</li>
									<li>&#x203A; Dar aos alunos importantes ferramentas que visam a sua inserção nas actividades laborais, dentro e fora do país.
										Importa, portanto, referir que estas missões, visões e valores ao nível macro (Rede Eiffel) são os mesmos defendidos ao nível micro (os quatro liceus da Rede)</li>
									<li>&#x203A; <a href="https://ao.ambafrance.org/-Portugais-" target="_blank">A Embaixada de França em Angola</a></li>
								</ul>
							</div>
							<div class="col s12 m12 l4" style="margin-top: 100px;">
								<img src="/assets/img/parceiros/embaixada-logo.jpg" class="responsive-img" alt="">
							</div>
						</div>


					</div>


				</div>
			</div>
		</div>
	</section>

@endsection
