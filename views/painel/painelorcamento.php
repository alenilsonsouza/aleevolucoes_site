<div class="row">
	<div class="col s12">
		<h5>Orçamento</h5>
	</div>
</div>
<div class="row">
	<div class="col s12">
		<table class="striped responsible_table">
			<tr>
				<th>Data</th>
				<th>Nome</th>
				<th>E-mail</th>
				<th>Celular</th>
				<th>Mensagem</th>
			</tr>
			<?php foreach($orcamentos as $orca):?>
				<tr>
					<td><?php echo date('d/m/Y', strtotime($orca['data']));?></td>
					<td><?php echo $orca['nome'];?></td>
					<td><?php echo $orca['email'];?></td>
					<td><?php echo $orca['celular'];?></td>
					<td><?php echo $orca['mensagem'];?></td>
				</tr>
			<?php endforeach;?>
		</table>
	</div>
</div>
<div class="row">
	<div class="col s12">
	<ul class="pagination">
     <?php for($q=1;$q<=$paginas;$q++): ?>
	<?php if($paginaAtual == $q): ?>
	<li class="active"><a href="<?php echo BASE_URL;?>painelorcamento?p=<?php echo $q;?>"><strong><?php echo $q;?></strong></a></li>
	<?php else: ?>	
	<li class="waves-effect"><a href="<?php echo BASE_URL;?>painelorcamento?p=<?php echo $q;?>"><?php echo $q;?></a></li>
	<?php endif;?>
	<?php endfor;?>	
 </ul>
	</div>
</div>
