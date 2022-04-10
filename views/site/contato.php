<div class="espacoTopo"></div>
<section class="areaTitulo">
	<div class="conteudo conteudoAreaTitulo">
		<h1>Contato <img src="<?php echo BASE_URL;?>assets/images/seta.svg" class="pisca"></h1>
	</div>
</section>

<section class="conteudo conteudoInterno conteudoContato marginBottom">
<?php if(!empty($aviso)):?>
<p><?php echo $aviso;?></p>
<?php else:?>
	<form method="post">
		<input type="text" name="nome" placeholder="Nome" required>
		<input type="email" name="email" placeholder="E-mail" required>
		<input type="text" name="assunto" placeholder="Assunto">
		<textarea name="mensagem" placeholder="Mensagem"></textarea>
		<div class="captcha">
			<div class="soma"><?php echo $n1;?> + <?php echo $n2;?> =</div>
			<input type="text" name="captcha" required placeholder="Qual o resultado?">
		</div>
		<div class="areaBotao">
			<input type="submit" value="Enviar" class="botao botao_sombra">
		</div>
		
	</form>
	<div class="infoContato">

		<div class="infoContatos">
			<img src="<?php echo BASE_URL;?>assets/images/email_contato.svg"> <span>contato@aleevolucoes.com.br</span>
		</div>

		<div class="infoContatos">
			<img src="<?php echo BASE_URL;?>assets/images/whatsapp_contato.svg"> <span>27 99812.5006</span>
		</div>

	</div>
<?php endif;?>	
</section>
