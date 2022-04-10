<div class="row">
	<div class="col s12">
		<nav>
    <div class="nav-wrapper">
      <ul id="nav-mobile" class="hide-on-med-and-down">
        <li><a href="<?php echo BASE_URL;?>painelevolucoes/adicionar">Adicionar</a></li>
        <li><a href="<?php echo BASE_URL;?>painelevolucoes/categorias">Categorias</a></li>
        
      </ul>
    </div>
  </nav>
	</div>
</div>
<div class="row">
	<div class="col s12">
		<h5>Evoluções</h5>
	</div>
</div>
<div class="row">
	<div class="col s12">
		<?php foreach($evolucoes as $categoria):?>
			<div>
				<strong><?php echo $categoria['nome'];?></strong>
			</div>
			<table class="striped">
				
				<?php foreach($categoria['evolucoes'] as $evolucao):?>
					<tr>
						<td width="150">
							<img src="<?php echo BASE_URL;?>assets/arquivos/<?php echo $evolucao['url_arquivo'];?>" width="80">
						</td>
						<td width="350">
							<?php echo $evolucao['nome_projeto'];?>
						</td>
						<td>
							<a href="<?php echo BASE_URL;?>painelevolucoes/editar/<?php echo md5($evolucao['id_evolucao']);?>" class="btn">Editar</a>
							<a href="<?php echo BASE_URL;?>painelevolucoes/excluir/<?php echo md5($evolucao['id_evolucao']);?>" class="btn" onclick="return confirm('Deseja realmente excluir?');">Excluir</a>
						</td>
					</tr>
				<?php endforeach;?>
				<?php if(count($categoria['evolucoes'])==0):?>
					<p>Nenhum Portfólio cadastrado!</p>
				<?php endif;?>
			</table>
		<?php endforeach;?>
	</div>
</div>