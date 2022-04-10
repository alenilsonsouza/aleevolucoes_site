
<div class="conteudoMenor conteudoDuvidasFrequentes">
		<?php foreach($duvidas as $duvida):?>
			<div class="itemDuvida">
				<div class="tituloDuvida">
					<?php echo $duvida['pergunta'];?>
				</div>
				<img src="<?php echo BASE_URL;?>assets/images/seta_baixo.svg" class="setaAbrir">
				<div class="respostaDuvida sombra"> 
					<?php echo $duvida['resposta'];?>
				</div>
			</div>
		<?php endforeach;?>
		<?php if(count($duvidas) == 0):?>
			<p>Nenhuma Dúvida Cadastrada!</p>
		<?php endif;?>
		
	</div>
</section>
<div class="conteudo conteudoInterno marginBottom">
<?php if(empty($pesquisa)):?>	
	<ul class="pagination">
     <?php for($q=1;$q<=$paginas;$q++): ?>
	<?php if($paginaAtual == $q): ?>
	<li class="active"><a href="javascript:;" data-p="<?php echo $q;?>" class="pag"><strong><?php echo $q;?></strong></a></li>
	<?php else: ?>	
	<li class="waves-effect"><a href="javascript:;" data-p="<?php echo $q;?>" class="pag"><?php echo $q;?></a></li>
	<?php endif;?>
	<?php endfor;?>	
 </ul>
<?php endif;?>
</div>