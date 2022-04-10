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
    <h5>Categorias</h5> 
  </div>
</div>
<div class="row">
  <form  method="post" class="col s12">
    <div class="row">
      <div class="input-field col s6">
        <input type="text" name="nome" required>
        <label for="nome">Nome:</label>
      </div>
      <div class="input-field col s3">
        <input type="number" name="ordem" required>
        <label for="ordem">Ordem:</label>
      </div>
      <div class="input-field col s3">
        <input type="submit" value="Cadastrar" class="btn">
      </div>
    </div>
  </form>
</div>

<div class="row">
  <div class="col s12">
    <p><strong>OBS: Só é possível excluir a categoria caso não tenha projetos cadastrado.</strong></p>
    <table class="striped">
      <tr>
        <th>Nome</th>
        <th>Ordem</th>
        <th>Ação</th>
      </tr>
      <?php foreach($categorias as $categoria):?>
        <tr>
          <td width="100"><?php echo $categoria['nome'];?></td>
          <td width="50"><?php echo $categoria['ordem'];?></td>
          <td>
            <a href="<?php echo BASE_URL;?>painelevolucoes/editarcategoria/<?php echo md5($categoria['id_evolucao_categoria']);?>" class="btn">Editar</a>
            <a href="<?php echo BASE_URL;?>painelevolucoes/excluircategoria/<?php echo md5($categoria['id_evolucao_categoria']);?>" class="btn" onclick="return confirm('Deseja realmente excluir');">Excluir</a>
          </td>
        </tr>
      <?php endforeach;?>
    </table>
  </div>
</div>