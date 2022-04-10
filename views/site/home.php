<?php if (!empty($_SESSION['formOrcamento'])) : ?>
	<div class="modalFormResult">
		<div class="modalFormResulContent">
			<div class="btFechar" id="btFecharModal">X</div>
			<?= $_SESSION['formOrcamento'];?>
		</div>
	</div>
<?php endif; ?>
<section id="banner" class="aparecerFade">
	<?php if ($config['mostrar_banner'] == 1) : ?>
		<div id="vanilla-slideshow-container">

			<div id="vanilla-slideshow">
				<?php foreach ($banners as $banner) : ?>
					<div class="vanilla-slide" style="background-image: url(<?= BASE_URL; ?>assets/arquivos/<?php echo $banner['url_arquivo']; ?>)">

						<section class="caixaBanner sombra">
							<div class="texto">
								<h2><?= $banner['nome_banner']; ?></h2>
								<a href="https://api.whatsapp.com/send?phone=5527998125006&text=Ol%C3%A1%20Preciso%20de%20um%20or%C3%A7amento%2C%20entrei%20pelo%20site%20AleEvolu%C3%A7%C3%B5es.%20Grato!" target="_blank" class="botao">Quero um orçamento</a>
							</div>
						</section>
					</div>
				<?php endforeach; ?>
			</div>

			<!-- slideshow indicators -->
			<div id="vanilla-indicators"></div>

			<!-- slideshow arrows -->
			<div id="vanilla-slideshow-previous">
				<!--<img src="<?php echo BASE_URL; ?>assets/images/arrow-previous.png" alt="slider arrow">-->
			</div>
			<div id="vanilla-slideshow-next">
				<!--<img src="<?php echo BASE_URL; ?>assets/images/arrow-next.png" alt="slider arrow">-->
			</div>

		</div>
	<?php elseif ($config['mostrar_banner'] == 2) : ?>
		<?php foreach ($video as $video) : ?>
			<video autoplay="autoplay" muted="muted" class="banner-video">
				<source src="<?php echo BASE_URL; ?>assets/arquivos/<?php echo $video['url_arquivo']; ?>" type="video/mp4">
			</video>
		<?php endforeach; ?>
	<?php endif; ?>
	<div class="formCapt">
		<form action="" method="post">
			<h3>Peça o seu orçamento e<br />entraremos em contato</h3>
			<input type="text" name="name" id="name" placeholder="Seu nome" required>
			<input type="email" name="email" id="email" placeholder="Seu E-mail" required>
			<input type="tel" name="tel" id="tel" placeholder="Seu Whatsapp" required>
			<select name="option" id="option" required>
				<option value="">Escolha uma opção</option>
				<option value="Sitema de Estoque">Sistema de Estoque</option>
				<option value="Sitema para Plano de saúde">Sistema para Plano de Saúde</option>
				<option value="Sistema para meu negócio">Sistema para meu negócio</option>
				<option value="Página de Captura">Página de Captura</option>
				<option value="Site para o meu negócio">Site para o meu negócio</option>
				<option value="Loja Virtual">Loja Virtual</option>
				<option value="E-mail Profissional">E-mail Profissional</option>
			</select>
			<button type="submit" class="botao">Pedir orçamento</button>
		</form>
	</div>
</section>


<script src="<?php echo BASE_URL; ?>assets/js/vanillaSlideshow.min.js"></script>
<script>
	vanillaSlideshow.init({
		slideshow: true,
		delay: 8000,
		arrows: true,
		indicators: true,
		random: false,
		animationSpeed: '1s'
	});
</script>
<section class="areaTitulo">
	<div class="conteudo conteudoAreaTitulo">
		<h1>Evoluções <img src="<?php echo BASE_URL; ?>assets/images/seta.svg" class="pisca"> Nossos Trabalhos</h1>
	</div>
</section>
<div class="conteudoFundoEvolucoes">
	<section class="conteudo conteudoInterno">
		<p>Quer ver mais detalhes dos nossos projetos?<br>Clique sobre um projeto abaixo e veja<br> informações completa.</p>
		<div class="areaEvolucoesHome">
			<?php foreach ($evolucoes as $evolucao) : ?>
				<div class="itemEvolucoes">
					<figure>
						<a href="<?php echo BASE_URL; ?>evolucoes/projeto/<?php echo $evolucao['slug']; ?>">
							<img src="<?php echo BASE_URL; ?>assets/arquivos/<?php echo $evolucao['url_arquivo']; ?>" alt="<?php echo $evolucao['nome_projeto']; ?>">
							<figcaption class="nomeCapa">
								<div class="tituloCapa"><?php echo $evolucao['nome_projeto']; ?></div>
								<div class="avisoTitulo">Clique e veja a descrição do projeto</div>
							</figcaption>

						</a>
					</figure>
				</div>
			<?php endforeach; ?>

		</div>
		<div style="text-align:center">
			<a href="<?php echo BASE_URL; ?>evolucoes" class="botao">Quero ver mais Projetos</a>
		</div>

	</section>
</div>
<section class="areaTitulo">
	<div class="conteudo conteudoAreaTitulo">
		<h1>O que deseja? <img src="<?php echo BASE_URL; ?>assets/images/seta.svg" class="pisca"></h1>
	</div>
</section>
<section class="conteudo conteudoInterno conteudoHomeBlocos">
	<div class="blocoDestaque">
		<figure>
			<img src="<?php echo BASE_URL; ?>assets/images/icone_sites.svg">
		</figure>
		<h3>Site</h3>
		<div class="descricao">Site para o divulgar o seu negócio na internet<br>em <strong>todas as telas</strong>. </div>
		<div class="btBloco">
			<a href="<?= BASE_URL; ?>contato" class="botao">Quero Orçamento</a>
		</div>
	</div>
	<div class="blocoDestaque">
		<figure>
			<img src="<?php echo BASE_URL; ?>assets/images/server.svg">
		</figure>
		<h3>Sistema</h3>
		<div class="descricao">Precisa de uma <strong>solução</strong><br>para o seu negócio?</div>
		<div class="btBloco">
			<a href="<?= BASE_URL; ?>contato" class="botao">Quero Orçamento</a>
		</div>
	</div>
	<div class="blocoDestaque">
		<figure>
			<img src="<?php echo BASE_URL; ?>assets/images/online-shop.svg">
		</figure>
		<h3>Lj Virtual</h3>
		<div class="descricao"><strong>Venda</strong> seus produto e/ou serviços no mundo online.</div>
		<div class="btBloco">
			<a href="<?= BASE_URL; ?>contato" class="botao">Quero Orçamento</a>
		</div>
	</div>
	<div class="blocoDestaque">
		<figure>
			<img src="<?php echo BASE_URL; ?>assets/images/coding.svg">
		</figure>
		<h3>Programador</h3>
		<div class="descricao">Precisa de um programador <strong>especializado</strong>?</div>
		<div class="btBloco">
			<a href="<?= BASE_URL; ?>contato" class="botao">Quero Orçamento</a>
		</div>
	</div>
</section>
<section class="areaTitulo">
	<div class="conteudo conteudoAreaTitulo">
		<h1>Etapas <img src="<?php echo BASE_URL; ?>assets/images/seta.svg" class="pisca"> Desenvolvimento</h1>
	</div>
</section>

<section class="conteudo conteudoInterno">
	<div class="subtitulo">
		<p class="centralizado">Abaixo você confere as etapas de devenvolvimento de um<br>projeto web site ou sistema.</p>
	</div>
	<div class="areaprocesso">
		<div class="processoIten">
			<div class="processoN">1</div>
			<div class="processoDescricao">Levantamento de<br>Recursos</div>
		</div>
		<div class="processoIten">
			<div class="processoN">2</div>
			<div class="processoDescricao">Criação e estilização<br>de Telas</div>
		</div>
		<div class="processoIten">
			<div class="processoN">3</div>
			<div class="processoDescricao">Programação De<br>funcionalidades</div>
		</div>
		<div class="processoIten">
			<div class="processoN">4</div>
			<div class="processoDescricao">Testes e Aprovação</div>
		</div>
		<div class="processoIten">
			<div class="processoN">5</div>
			<div class="processoDescricao">Entrega e Publicação</div>
		</div>
	</div>
</section>

<section class="areaTitulo areaTituloEscuro">
	<div class="conteudo conteudoAreaTitulo">
		<h1>Parceiros</h1>
	</div>
</section>
<section class="conteudo conteudoInterno">
	<div class="parceiros">
		<figure>
			<img src="<?php echo BASE_URL; ?>assets/images/final_marca_orbita.png" alt="Parceria Agência Órbita">
		</figure>

		<figure>
			<img src="<?php echo BASE_URL; ?>assets/images/logo_dettmann.png" alt="Parceria Dettmann">
		</figure>

		<figure>
			<img src="<?php echo BASE_URL; ?>assets/images/paginaberta.png" alt="Parceria Páginaberta">
		</figure>
	</div>
	<div class="areaBotaoParceiro">
		<a href="<?php echo BASE_URL; ?>contato" class="botao">Quero fazer uma parceria</a>
	</div>
</section>


<section id="areaAgencia" class="marginBottom" style="background-image: url(<?php echo BASE_URL; ?>assets/images/banner_agencia.png)">
	<div class="conteudo conteudoAgencia">
		<div class="boxAgencia sombra">
			<h2>Agência!</h2>
			<p>Programamos o seu projeto</p>
			<div class="areaBotaoAgencia">
				<a href="<?= BASE_URL; ?>contato" class="botao">Quero Orçamento</a>
			</div>
		</div>
	</div>
</section>