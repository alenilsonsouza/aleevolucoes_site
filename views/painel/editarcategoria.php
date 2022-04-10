<div class="row">
	<div class="col s12">
		<nav>
    <div class="nav-wrapper">
      <ul id="nav-mobile" class="hide-on-med-and-down">
        <li><a href="<?php echo BASE_URL;?>painelevolucoes/categorias">Voltar</a></li>
      </ul>
    </div>
  </nav>
	</div>
</div>
<div class="row">
  <div class="col s12">
    <h5>Editar Categorias</h5> 
  </div>
</div>
<div class="row">
  <form  method="post" class="col s12">
    <div class="row">
      <div class="input-field col s6">
        <input type="text" name="nome" required value="<?php echo $categoria['nome'];?>">
        <label for="nome">Nome:</label>
      </div>
      <div class="input-field col s3">
        <input type="number" name="ordem" required value="<?php echo $categoria['ordem'];?>">
        <label for="ordem">Ordem:</label>
      </div>
      <div class="input-field col s3">
        <input type="submit" value="Atualizar" class="btn">
      </div>
    </div>
  </form>
</div>

