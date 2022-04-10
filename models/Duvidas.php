<?php

class Duvidas extends model{
	
	private $pergunta;
	private $resposta;
	private $data;

	public function setPergunta($texto){
		if(filter_var($texto, FILTER_SANITIZE_STRING)){
			$this->pergunta = $texto;
		}
	}

	public function setResposta($texto){
		if(filter_var($texto, FILTER_SANITIZE_STRING)){
			$this->resposta = $texto;
		}
	}

	public function salvar($id=''){

		if(!empty($id)){
			$sql = "UPDATE duvidas SET pergunta = :pergunta, resposta = :resposta WHERE MD5(id_duvida) = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":pergunta", $this->pergunta);
			$sql->bindValue(":resposta", $this->resposta);
			$sql->bindValue(":id", $id);
			$sql->execute();
		}else{
			$sql = "INSERT INTO duvidas (pergunta, resposta, data) VALUES (:pergunta, :resposta, NOW())";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":pergunta", $this->pergunta);
			$sql->bindValue(":resposta", $this->resposta);
			$sql->execute();
		}
	}

	public function getList($offset, $limit, $pesquisa=''){

		$array = array();

		if(!empty($pesquisa)){

			$sql = "SELECT * FROM duvidas WHERE pergunta LIKE :pesquisa";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":pesquisa", '%'.$pesquisa.'%');
			$sql->execute();

		}else{
			
			$sql = "SELECT * FROM duvidas ORDER BY id_duvida DESC LIMIT $offset, $limit";
			$sql = $this->db->query($sql);
		}
		
		if($sql->rowCount()>0){
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function getTotal(){
		$sql = "SELECT COUNT(*) AS t FROM duvidas";
		$sql = $this->db->query($sql);
		$sql = $sql->fetch();
		return $sql['t'];
	}

	public function getDuvidaById($id){
		$array = array();
		$sql = "SELECT * FROM duvidas WHERE MD5(id_duvida) = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id",$id);
		$sql->execute();
		if($sql->rowCount()>0){
			$array = $sql->fetch();
		}
		return $array;
	}

	public function delete($id){

		$sql = "DELETE FROM duvidas WHERE MD5(id_duvida) = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id",$id);
		$sql->execute();
	}
}