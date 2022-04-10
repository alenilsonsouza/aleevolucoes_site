<?php
$s = new Site();
$site = $s->getArray();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<?php if(!empty($viewData['projetoNome'])):?>
	<title>Ale Evoluções - <?php echo $viewData['projetoNome'];?></title>
<?php else:?>
	<title><?php echo $site['titulo'];?> - <?php echo $viewData['titulo'];?></title>
<?php endif;?>

<link rel="apple-touch-icon" sizes="57x57" href="<?php echo BASE_URL;?>assets/images/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo BASE_URL;?>assets/images/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo BASE_URL;?>assets/images/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo BASE_URL;?>assets/images/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo BASE_URL;?>assets/images/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo BASE_URL;?>assets/images/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo BASE_URL;?>assets/images/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo BASE_URL;?>assets/images/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo BASE_URL;?>assets/images/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo BASE_URL;?>assets/images/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo BASE_URL;?>assets/images/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo BASE_URL;?>assets/images/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo BASE_URL;?>assets/images/favicon/favicon-16x16.png">
<link rel="manifest" href="<?php echo BASE_URL;?>assets/images/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php echo BASE_URL;?>assets/images/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<meta property="og:url" content="https:<?php echo BASE_URL;?>">
<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo $site['titulo'];?>">
<meta property="og:description" content="<?php echo $site['descricao'];?>">
<meta property="og:image" content="https:<?php echo BASE_URL;?>assets/images/post.png">

<meta name="description" content="<?php echo $site['descricao'];?>">
<meta name="keywords" content="<?php echo $site['palavra_chave'];?>">		
<link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=DM+Sans:400,400i,500,700&display=swap" rel="stylesheet">
<link rel="icon" href="<?php echo BASE_URL;?>assets/images/favicon.ico" sizes="16x16 32x32 64x64" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="<?php echo AUTOR;?>">
<style type="text/css">

	<?php require 'assets/css/geral.css';?>

</style>
</head>
<body>
<?php if(isset($viewData['dados']['aviso_orcamento'])):?>	
<div class="respostaBox">
	<div class="boxTexto sombra">
		<div class="btFecharResposta">X</div>
		<?php echo $viewData['dados']['aviso_orcamento'];?>
	</div>
</div>	
<?php endif;?>
<div class="areaWhatsapp">
	<a href="https://api.whatsapp.com/send?phone=5527998125006&text=Ol%C3%A1%20Preciso%20de%20um%20or%C3%A7amento%2C%20entrei%20pelo%20site%20AleEvolu%C3%A7%C3%B5es.%20Grato!" target="_blank" title="Converse com Ale Evoluções sobre o seu futuro projeto via Whatsapp.">
		<img src="<?php echo BASE_URL;?>assets/images/whatsapp.svg" alt="Whatsapp Ale Evoluoes - Entrar em contato">
	</a>
</div>
<div id="areaOrcamento">
	<form method="post" class="formOrcamento sombra">
		<div id="fecharPop">X</div>
		<h2>Pedir Orçamento</h2>

		<input type="text" name="nome_orcamento" placeholder="Nome" required>
		<input type="email" name="email_orcamento" placeholder="E-mail" required>
		<input type="tel" name="telefone_orcamento" placeholder="Celular (Whatsapp)" class="cel">
		<textarea name="mensagem_orcamento" placeholder="Mensagem"></textarea>
		<div class="captcha">
			<div class="soma"><?php echo $viewData['n1'];?> + <?php echo $viewData['n2'];?> =</div>
			<input type="text" name="captchap" required placeholder="Qual o resultado?">
		</div>
		<input type="submit" value="Enviar" class="botao botao_cinza sombra">
	</form>
</div>
<div id="tudo">	
<header id="topo">
	<div class="conteudo conteudoTopo">
		<figure id="logo">
			<a href="<?php echo BASE_URL;?>"><img src="<?php echo BASE_URL;?>assets/images/somente_logo.svg"></a>
		</figure>
		<nav id="menu">
			<ul>
				<!--<li><a href="<?php echo BASE_URL;?>empresa" class="<?php echo ($viewData['page']=='empresa')?'ativo':'';?>">Empresa</a></li>-->
				<li><a href="<?php echo BASE_URL;?>evolucoes" class="<?php echo ($viewData['page']=='evolucoes')?'ativo':'';?> <?php echo isset($viewData['homemenu'])?'home':'';?>">Evoluções</a></li>
				<li><a href="<?php echo BASE_URL;?>duvidasfrequentes" class="<?php echo ($viewData['page']=='duvidasfrequentes')?'ativo':'';?> <?php echo isset($viewData['homemenu'])?'home':'';?>">Dúvidas Frequentes</a></li>
				<li><a href="<?php echo BASE_URL;?>blog" class="<?php echo ($viewData['page']=='suporte')?'ativo':'';?> <?php echo isset($viewData['homemenu'])?'home':'';?>">Suporte</a></li>
				<li><a href="<?php echo BASE_URL;?>contato" class="<?php echo ($viewData['page']=='contato')?'ativo':'';?> <?php echo isset($viewData['homemenu'])?'home':'';?>">Contato</a></li>
				<!--<li><a href="javascript:;" class="botao botao_cinza abrirPop">Orçamento</a></li>-->
				<!--<li><a href="<?php echo BASE_URL;?>" class="botao botao_sombra">Entrar</a></li>-->
			</ul>
		</nav>
		<div class="btMenu">
			<div></div>
			<div></div>
			<div></div>
		</div>
		
	</div>
</header>  

	<?php $this->loadViewInTemplate($viewName, $viewData); ?>
</div>	
<footer id="rodape">
	<section class="conteudo conteudoRodape">
		<div class="areaEmail">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="36" height="36" viewBox="0 0 36 36"><defs><clipPath id="a"><rect width="36" height="36" transform="translate(55 1442)" fill="#64bd5d"/></clipPath></defs><g transform="translate(-55 -1442)" clip-path="url(#a)"><g transform="translate(55 1442)"><path d="M35.182,4.909H.818A.817.817,0,0,0,0,5.727V30.273a.817.817,0,0,0,.818.818H35.182A.818.818,0,0,0,36,30.273V5.727A.818.818,0,0,0,35.182,4.909Zm-.818,22.566L24.228,17.341,23.071,18.5,34.028,29.455H1.972L12.929,18.5l-1.157-1.157L1.636,27.475V6.545H34.364Z" fill="#64bd5d"/><path d="M32.71,6.545,18,21.256,3.29,6.545H1.636v.66L17.422,22.991a.817.817,0,0,0,1.157,0L34.364,7.206v-.66Z" fill="#64bd5d"/></g></g></svg>
			<span class="email">contato@aleevolucoes.com.br</span>
		</div>
		<div class="redes">
			<?php foreach($viewData['info']['redes'] as $rede):?>
				<a href="<?php echo $rede['link_rede'];?>" target="_blank"><img src="<?php echo BASE_URL;?>assets/arquivos/<?php echo $rede['url_arquivo'];?>" class="girar" alt="<?php echo $rede['nome_rede'];?>"></a>
			<?php endforeach;?>
			
		</div>
	</section>
	<div class="conteudo privacidade">
		<a href="<?php echo BASE_URL;?>politicaprivacidade">Política de privacidade</a>
	</div>
	<section id="direitos">
		2019<?php echo (date('Y') > 2019)?'-'.date('Y'):'';?> - Ale Evoluções - Todos os direitos reservados
	</section>
</footer>

<script type="text/javascript">var BASE_URL = '<?php echo BASE_URL;?>';</script>	
<script src="<?php echo BASE_URL;?>assets/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo BASE_URL;?>assets/js/script.js"></script>
<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/vanillaSlideshow.css">
<script language="JavaScript" type="text/javascript" src="<?=BASE_URL;?>assets/js/MascaraValidacao.js"></script>
<?php echo $site['scripts'];?>
</body>
</html>