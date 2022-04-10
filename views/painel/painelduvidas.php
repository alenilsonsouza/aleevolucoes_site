<div class="row">
	<div class="col s12">
		<nav>
    <div class="nav-wrapper">
      <ul id="nav-mobile" class="hide-on-med-and-down">
        <li><a href="<?php echo BASE_URL;?>painelduvidas/adicionar">Adicionar</a></li>
        
      </ul>
    </div>
  </nav>
	</div>
</div>
<div class="row">
	<div class="col s12">
		<h5>Dúvidas</h5>
	</div>
</div>
<div class="row">
	<div class="col s12">
		<table class="striped">
			<tr>
				<th width="250">Pergunta</th>
				<th width="250">Resposta</th>
				<th>Ações</th>
			</tr>
			<?php foreach($duvidas as $duvida):?>
				<tr>
					<td><?php echo $duvida['pergunta'];?></td>
					<td><?php echo $duvida['resposta'];?></td>
					<td>
						<a href="<?php echo BASE_URL;?>painelduvidas/editar/<?php echo md5($duvida['id_duvida']);?>" class="btn">Editar</a>
						<a href="<?php echo BASE_URL;?>painelduvidas/excluir/<?php echo md5($duvida['id_duvida']);?>" class="btn" onclick="return confirm('Deseja realmente excluir?')">Excluir</a>
					</td>
				</tr>
			<?php endforeach;?>
		</table>
		<?php if(count($duvidas) == 0):?>
			<p>Nenhuma Dúvida cadastrada!</p>
		<?php endif;?>
	</div>
</div>
<div class="row">
	<div class="col s12">
	<ul class="pagination">
     <?php for($q=1;$q<=$paginas;$q++): ?>
	<?php if($paginaAtual == $q): ?>
	<li class="active"><a href="<?php echo BASE_URL;?>painelduvidas?p=<?php echo $q;?>"><strong><?php echo $q;?></strong></a></li>
	<?php else: ?>	
	<li class="waves-effect"><a href="<?php echo BASE_URL;?>painelduvidas?p=<?php echo $q;?>"><?php echo $q;?></a></li>
	<?php endif;?>
	<?php endfor;?>	
 </ul>
	</div>
</div>