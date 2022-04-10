<div class="espacoTopo"></div>
<section class="areaTitulo">
	<div class="conteudo conteudoAreaTitulo">
		<h1>Evoluções <img src="<?php echo BASE_URL;?>assets/images/seta.svg" class="pisca"> <span class="cor_cinza"><?php echo $evolucao['nome_projeto'];?></span></h1>
	</div>
</section>
<figure class="bannerProjeto">
	<img src="<?php echo BASE_URL;?>assets/arquivos/<?php echo $evolucao['url_arquivo'];?>" alt="<?php echo $evolucao['nome_projeto'];?> [Ale Evoluções]">
</figure>
<div class="fundoProjeto marginBottom">
<section class="conteudo ">
	<div class="conteudoInterno">
		<div class="conteudoMenor">
			<article class="conteudoTextoProjeto">
				<h1><?php echo $evolucao['nome_projeto'];?></h1>
				<h3><?php echo $evolucao['nome'];?></h3>
				<p><strong>Descrição:</strong></p>
				<?php  if(!empty($evolucao['descricao'])):?>
					<p><?php echo $evolucao['descricao'];?></p>
				<?php else:?>
					<p>Projeto sem descrição</p>
				<?php endif;?>
			</article>

			<div class="areaNav">
				<?php if(isset($anterior['slug'])):?>
				<a href="<?php echo BASE_URL;?>evolucoes/projeto/<?php echo $anterior['slug'];?>" class="botao"><img src="<?php echo BASE_URL;?>assets/images/anterior.svg"> Anterior</a>
				<?php endif;?>
				<a href="<?php echo BASE_URL;?>evolucoes" class="botao">Voltar</a>
				<?php if(isset($proximo['slug'])):?>
					<a href="<?php echo BASE_URL;?>evolucoes/projeto/<?php echo $proximo['slug'];?>" class="botao">Próximo <img src="<?php echo BASE_URL;?>assets/images/proximo.svg"></a>
				<?php endif;?>
			</div>
			
		</div>
	</div>
</section>
</div>