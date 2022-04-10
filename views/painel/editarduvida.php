<div class="row">
	<div class="col s12">
		<nav>
    <div class="nav-wrapper">
      <ul id="nav-mobile" class="hide-on-med-and-down">
        <li><a href="<?php echo BASE_URL;?>painelduvidas">Voltar</a></li>
        
      </ul>
    </div>
  </nav>
	</div>
</div>
<div class="row">
	<div class="col s12">
		<h5>Editar Dúvidas</h5>
	</div>
</div>
<div class="row">
	<form method="post" class="col s12">
		<div class="row">
			<div class="input-field col s12">
				<input type="text" name="pergunta" required value="<?php echo $duvida['pergunta'];?>">
				<label for="pergunta">Pergunta:</label>
			</div>
			<div class="col s12">
				<textarea name="resposta" id="corpo"><?php echo $duvida['resposta'];?></textarea>
			</div>
			<div class="input-field col s12">
				<input type="submit" value="Atualizar" class="btn">
				
			</div>
		</div>
	</form>
</div>
<script type="text/javascript" src="<?php echo BASE_URL;?>ckeditor/ckeditor.js"></script>
<script type="text/javascript">
  window.onload=function(){
    CKEDITOR.replace("corpo");
  }
</script>