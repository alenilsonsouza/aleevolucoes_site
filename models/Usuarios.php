<?php
class Usuarios extends model{
	private $uid;
	private $usuario;
	protected $senha;
	private $array;
	
	public function __construct($id =''){
		parent::__construct();
		if(!empty($id)){
			$this->uid = $id;	
		}


	}

	public function setUsuario($usuario){
		if(filter_var($usuario, FILTER_SANITIZE_STRING)){
			$this->usuario = $usuario;
			return true;
		}else{
			return false;
		}
	}
	public function setEmail($email){
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			$this->email = $email;
			return true;
		}else{
			return false;
		}
	}
	public function setSenha($senha){
		if(filter_var($senha, FILTER_SANITIZE_STRING)){
			$this->senha = $senha;
			return true;
		}else{
			return false;
		}
	}

	public function getNome(){

		$sql = "SELECT * FROM usuarios WHERE MD5(id) = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $this->uid);
		$sql->execute();
		if($sql->rowCount()>0){
			$sql = $sql->fetch();
			return $sql['usuario'];
		}else{
			return '';
		}
	}

	public function getUsuarios(){
		$array = array();
		$sql = "SELECT * FROM usuarios WHERE MD5(id) != :id AND tipo = 2";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $_SESSION['plogin']);
		$sql->execute();
		if($sql->rowCount()>0){
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function isLogged(){
		$ip = $_SERVER['REMOTE_ADDR'];
		$data = date("Y-m-d");
		$navegador = $_SERVER['HTTP_USER_AGENT'];

		$sql = "SELECT * FROM usuarios WHERE ip = :ip AND ultimo_login = :data AND navegador = :navegador";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":ip", $ip);
		$sql->bindValue(":data", $data);
		$sql->bindValue(":navegador",$navegador);
		$sql->execute();
		if($sql->rowCount()>0){
			$sql= $sql->fetch();
			$_SESSION['plogin'] = md5($sql['id']);

		}else{
			$_SESSION['plogin'] ='';
		}

		

		if(isset($_SESSION['plogin']) && !empty($_SESSION['plogin'])){

			
			$sql = "SELECT * FROM usuarios WHERE MD5(id) = :id AND ip = :ip";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":id", $_SESSION['plogin']);
			$sql->bindValue(":ip", $ip);
			$sql->execute();
			if($sql->rowCount()>0){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	public function usuarioExiste($email){
		
		$sql = "SELECT * FROM usuarios WHERE email = :email";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":email", $email);
		$sql->execute();
		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function inserirUsuario(){
		$sql = "INSERT INTO usuarios (usuario, email, senha, tipo) VALUES (:nome, :email, :senha, :tipo)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":nome", $this->usuario);
		$sql->bindValue(":email", $this->email);
		$sql->bindValue(":senha", $this->senha);
		$sql->bindValue(":tipo",2);
		$sql->execute();
		$id = $this->db->lastInsertId();
		return $id;
	
	}
	public function fazerLogin($email, $senha){
		
		$sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":senha", $senha);
		$sql->execute();
				
		if($sql->rowCount() > 0){
			$sql = $sql->fetch();
			$id = $sql['id'];
			$_SESSION['plogin'] = md5($id);
			$ip = $_SERVER['REMOTE_ADDR'];
			$data_hora = date("Y-m-d");
			$navegador = $_SERVER['HTTP_USER_AGENT'];

			$sql = "UPDATE usuarios SET ip = :ip, ultimo_login = :data_hora, navegador = :navegador WHERE id = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":ip", $ip);
			$sql->bindValue(":data_hora", $data_hora);
			$sql->bindValue(":navegador", $navegador);
			$sql->bindValue(":id", $id);
			$sql->execute();
			return true;
			
		}else{
			return false;
		}
	}

	public function logout(){

		if(isset($_SESSION['plogin']) && !empty($_SESSION['plogin'])){

			$sql = "UPDATE usuarios SET ip = :ip, ultimo_login = :data, navegador = :navegador WHERE MD5(id) = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":ip",NULL);
			$sql->bindValue(":data",NULL);
			$sql->bindValue(":navegador", NULL);
			$sql->bindValue(":id", $_SESSION['plogin']);
			$sql->execute();

			unset($_SESSION['plogin']); 
		}
	}

	public function excluir($id){

		$sql = "DELETE FROM usuarios WHERE MD5(id) = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();
	}

	public function getUser(){
		$array = array();
		$sql = "SELECT * FROM usuarios WHERE MD5(id) = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $this->uid);
		
		$sql->execute();
		if($sql->rowCount()>0){
			$array = $sql->fetch();
		}

		return $array;
	}
	public function atualizar(){

		$sql = "UPDATE usuarios SET usuario = :usuario, email = :email WHERE MD5(id) = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":usuario", $this->usuario);
		$sql->bindValue(":email", $this->email);
		$sql->bindValue(":id", $this->uid);
		$sql->execute();

		if(!empty($this->senha)){
			$sql = "UPDATE usuarios SET senha = :senha WHERE MD5(id) = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":senha", $this->senha);
			$sql->bindValue(":id", $this->uid);
			$sql->execute();
		}
	}

	public function getTotal(){
		$sql = "SELECT COUNT(*) as t FROM usuarios";
		$sql = $this->db->query($sql);
		$sql = $sql->fetch();
		return $sql['t'];
	}
	
	
	
	
	
}
