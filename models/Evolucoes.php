<?php
class Evolucoes extends model{
	private $id_arquivo;
	private $id_categoria;
	private $nome_projeto;
	private $slug;
	private $descricao;

	public function setIdArquivo($id){
		if(filter_var($id, FILTER_VALIDATE_INT)){
			$this->id_arquivo = $id;
		}
	}

	public function setIdCategoria($id){
		if(filter_var($id, FILTER_VALIDATE_INT)){
			$this->id_categoria = $id;
		}
	}

	public function setNomeProjeto($nome){
		if(filter_var($nome, FILTER_SANITIZE_STRING)){
			$this->nome_projeto = $nome;
		}
	}

	public function setSlug($slug){
		if(filter_var($slug, FILTER_SANITIZE_STRING)){
			$this->slug = $slug;
		}
	}

	public function setDescricao($texto){
		if(filter_var($texto, FILTER_SANITIZE_STRING)){
			$this->descricao = $texto;
		}
	}

	public function getListByCategoria($id_categoria){
		$array = array();
		$sql = "SELECT * FROM evolucoes LEFT JOIN evolucoes_categoria ON evolucoes.id_categoria = evolucoes_categoria.id_evolucao_categoria LEFT JOIN arquivos ON evolucoes.id_arquivo = arquivos.id WHERE MD5(evolucoes.id_categoria) = :id_categoria";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id_categoria", $id_categoria);
		$sql->execute();
		if($sql->rowCount()>0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getListByIdEvolucoes($id){
		$array = array();
		$sql = "SELECT * FROM evolucoes LEFT JOIN evolucoes_categoria ON evolucoes.id_categoria = evolucoes_categoria.id_evolucao_categoria LEFT JOIN arquivos ON evolucoes.id_arquivo = arquivos.id WHERE MD5(evolucoes.id_evolucao) = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();
		if($sql->rowCount()>0){
			$array = $sql->fetch();
		}

		return $array;
	}

	public function getEvolucaoBySlug($slug){

		$array = array();
		$sql = "SELECT * FROM evolucoes LEFT JOIN evolucoes_categoria ON evolucoes.id_categoria = evolucoes_categoria.id_evolucao_categoria LEFT JOIN arquivos ON evolucoes.id_arquivo = arquivos.id WHERE evolucoes.slug = :slug";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":slug", $slug);
		$sql->execute();
		if($sql->rowCount()>0){
			$array = $sql->fetch();
		}

		return $array;
	}

	public function salvar($id=''){

		if(!empty($id)){

			$sql = "UPDATE evolucoes SET id_categoria = :id_categoria, nome_projeto = :nome_projeto, slug = :slug, descricao = :descricao WHERE MD5(id_evolucao) = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":id_categoria", $this->id_categoria);
			$sql->bindValue(":nome_projeto", $this->nome_projeto);
			$sql->bindValue(":slug", $this->slug);
			$sql->bindValue(":descricao", $this->descricao);
			$sql->bindValue(":id", $id);
			$sql->execute();


		}else{
			$sql = "INSERT INTO evolucoes (id_arquivo, id_categoria, nome_projeto, slug, descricao) VALUES (:id_arquivo, :id_categoria, :nome_projeto, :slug, :descricao)";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":id_arquivo", $this->id_arquivo);
			$sql->bindValue(":id_categoria", $this->id_categoria);
			$sql->bindValue(":nome_projeto", $this->nome_projeto);
			$sql->bindValue(":slug", $this->slug);
			$sql->bindValue(":descricao", $this->descricao);
			$sql->execute();
		}
	}

	public function preview($id){
		$array = array();
		$sql = "SELECT slug FROM evolucoes WHERE id_evolucao < :id ORDER BY id_evolucao DESC LIMIT 1";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();
		if($sql->rowCount()>0){
			$array = $sql->fetch();
		}
		return $array;
	}

	public function next($id){
		$array = array();
		$sql = "SELECT slug FROM evolucoes WHERE id_evolucao > :id ORDER BY id_evolucao ASC LIMIT 1";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();
		if($sql->rowCount()>0){
			$array = $sql->fetch();
		}

		return $array;
	}

	public function getListRand(){
		$array = array();
		$sql = "SELECT * FROM evolucoes LEFT JOIN evolucoes_categoria ON evolucoes.id_categoria = evolucoes_categoria.id_evolucao_categoria LEFT JOIN arquivos ON evolucoes.id_arquivo = arquivos.id ORDER BY RAND() LIMIT 6";
		$sql = $this->db->query($sql);
		if($sql->rowCount()>0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function excluir($id){

		$item = $this->getListByIdEvolucoes($id);
		

		$arquivos = new Arquivos();
		$arquivos->excluirArquivo($item['id_arquivo']);

		$sql = "DELETE FROM evolucoes WHERE MD5(id_evolucao) = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();
	}
}