<div class="espacoTopo"></div>
<section class="areaTitulo">
	<div class="conteudo conteudoAreaTitulo">
		<h1>Evoluções <img src="<?php echo BASE_URL;?>assets/images/seta.svg" class="pisca"></h1>
	</div>
</section>
<div class="menuEvolucoesFixo">
<div class="conteudo">
	<nav class="menuEvolucoes">
		<ul>
			<?php foreach($evolucoes as $categoria):?>
				<li>
					<a href="#<?php echo $categoria['nome'];?>" class="desliz"><?php echo $categoria['nome'];?></a>

				</li>
			<?php endforeach;?>
				
					<li class="outroMenu">
						<a href="javascript:;" class="abrirPop">Orçamento</a>
					</li>
					<li class="outroMenu">
						<a href="<?php echo BASE_URL;?>contato">Contato</a>
					</li>
				
		</ul>
	</nav>
</div>
</div>
<div class="conteudo marginBottom">
<?php foreach($evolucoes as $categoria):?>
<section class="areaSubTitulo">
	<div class="conteudo">
		<h2 id="<?php echo $categoria['nome'];?>"><figure><img src="<?php echo BASE_URL;?>assets/images/monitor.svg"></figure><?php echo $categoria['nome'];?></h2>
	</div>
</section>
<section class="areaEvolucoes">
	<?php foreach($categoria['evolucoes'] as $evolucao):?>
		<div class="itemEvolucoes">
			<figure>
				<a href="<?php echo BASE_URL;?>evolucoes/projeto/<?php echo $evolucao['slug'];?>">
					<img src="<?php echo BASE_URL;?>assets/arquivos/<?php echo $evolucao['url_arquivo'];?>" alt="<?php echo $evolucao['nome_projeto'];?> - <?php echo $categoria['nome'];?> [Ale Evoluções]">
					<figcaption class="nomeCapa">
						<div class="tituloCapa"><?php echo $evolucao['nome_projeto'];?></div>
						<div class="avisoTitulo">Clique e veja a descrição do projeto</div>
					</figcaption>
					
				</a>
			</figure>
		</div>
	<?php endforeach;?>
	
	
</section>
<?php endforeach;?>
</div>
