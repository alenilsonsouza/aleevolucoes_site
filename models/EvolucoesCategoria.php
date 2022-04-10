<?php
class EvolucoesCategoria extends model{

	private $nome;
	private $ordem;

	public function setNome($nome){
		if(filter_var($nome, FILTER_SANITIZE_STRING)){
			$this->nome = $nome;
		}
	}

	public function setOrdem($ordem){
		if(filter_var($ordem, FILTER_VALIDATE_INT)){
			$this->ordem = $ordem;
		}
	}

	public function salvar($id=''){
		if(!empty($id)){
			$sql = "UPDATE evolucoes_categoria SET nome = :nome, ordem = :ordem WHERE MD5(id_evolucao_categoria) = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":nome", $this->nome);
			$sql->bindValue(":ordem", $this->ordem);
			$sql->bindValue(":id", $id);
			$sql->execute();
		}else{

			$sql = "INSERT INTO evolucoes_categoria (nome, ordem) VALUES (:nome, :ordem)";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":nome", $this->nome);
			$sql->bindValue(":ordem", $this->ordem);
			$sql->execute();

		}
	}

	public function getListCategoriaEEvolucoes(){
		$array = array();

		

		$sql = "SELECT * FROM evolucoes_categoria ORDER BY RAND()";
		$sql = $this->db->query($sql);
		if($sql->rowCount()>0){
			$array = $sql->fetchAll();
			$evolucoes = new Evolucoes();
			foreach ($array as $key => $item) {
				
				$array[$key]['evolucoes'] = $evolucoes->getListByCategoria(md5($item['id_evolucao_categoria']));
			}
		}

		

		return $array;

	}

	public function getList($id=''){
		$array = array();

		if(!empty($id)){

			$sql = "SELECT * FROM evolucoes_categoria WHERE MD5(id_evolucao_categoria) = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":id", $id);
			$sql->execute();
			if($sql->rowCount()>0){
				$array = $sql->fetch();
			}

		}else{

			$sql = "SELECT * FROM evolucoes_categoria ORDER BY ordem ASC";
			$sql = $this->db->query($sql);
			if($sql->rowCount()>0){
				$array = $sql->fetchAll();
			}
			
		}

		return $array;

	}

	public function verificarSeTemEvolucoes($id_categoria){

		$sql = "SELECT * FROM evolucoes WHERE MD5(id_categoria) = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id_categoria);
		$sql->execute();
		if($sql->rowCount()>0){
			return true;
		}else{
			return false;
		}
	}

	public function excluir($id){

		$sql = "DELETE FROM evolucoes_categoria WHERE MD5(id_evolucao_categoria) = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

	}


}