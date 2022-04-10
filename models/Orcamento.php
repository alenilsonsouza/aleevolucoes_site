<?php
class Orcamento extends model{

	private $nome;
	private $email;
	private $celular;
	private $mensagem;
	private $data;


	public function setNome($nome){
		if(filter_var($nome, FILTER_SANITIZE_STRING)){
			$this->nome = $nome;
		}
	}

	public function setEmail($email){
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			$this->email = $email;
		}
	}
	public function setCelular($celular){
		if(filter_var($celular, FILTER_SANITIZE_STRING)){
			$this->celular = $celular;
		}
	}

	public function setMensagem($mensagem){
		if(filter_var($mensagem, FILTER_SANITIZE_STRING)){
			$this->mensagem = $mensagem;
		}
	}

	public function salvar(){

		$sql = "INSERT INTO orcamento (nome, email, celular, mensagem, data) VALUES (:nome, :email, :celular, :mensagem, NOW())";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nome', $this->nome);
		$sql->bindValue(':email', $this->email);
		$sql->bindValue(':celular', $this->celular);
		$sql->bindValue(':mensagem', $this->mensagem);
		$sql->execute();

		if(ENVIRONMENT == 'production'){
			$email = new Email();
			$email->setNome($this->nome);
			$email->setEmail($this->email);
			$email->setTelefone($this->celular);
			$email->setMensagem($this->mensagem);
			$email->enviarOrcamento();
		}
		
	}

	public function getList($offset, $limit){
		$array = array();
		$sql = "SELECT * FROM orcamento ORDER BY id_orcamento DESC LIMIT $offset, $limit";
		$sql = $this->db->query($sql);
		if($sql->rowCount()>0){
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function getTotal(){
		$sql = "SELECT COUNT(*) AS t FROM orcamento";
		$sql = $this->db->query($sql);
		$sql = $sql->fetch();
		return $sql['t'];
	}
}