<div class="row">
	<div class="col s12">
		<nav>
    <div class="nav-wrapper">
      <ul id="nav-mobile" class="hide-on-med-and-down">
        <li><a href="<?php echo BASE_URL;?>painelevolucoes">Voltar</a></li>
        
      </ul>
    </div>
  </nav>
	</div>
</div>
<div class="row">
	<div class="col s12">
		<h5>Adicioanr Evoluções</h5>
	</div>
</div>

<div class="row">
  <form class="col s12" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col s6 input-field">
        <input type="text" name="nome_projeto" required="required">
        <label for="nome_projeto">Nome do Projeto:</label>
      </div>
      <div class="col s6 input-field file-field">
        <div class="btn">
              <span>Imagem:</span>
              <input type="file" name="imagem" required="required">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text">
            </div>
        </div>
    </div>
    <div class="col s12">
      <label>Categoria</label>
      <select class="browser-default" name="id_categoria">
        <?php foreach($categorias as $categoria):?>
          <option value="<?php echo $categoria['id_evolucao_categoria'];?>"><?php echo $categoria['nome'];?></option>
        <?php endforeach;?>
      </select>
    </div>
    <div class="col s12 input-field">
      <textarea id="corpo" name="descricao"></textarea>
    </div>
    <div class="row">
        <div class="input-field col s12">
          <input type="submit" value="Cadastrar" class="btn">
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