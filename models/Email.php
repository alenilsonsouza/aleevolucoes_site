<?php
class Email extends model{

	private $nome;
	private $email;
	private $telefone;
	private $assunto;
	private $mensagem;

	public function setNome($nome){
		$this->nome = $nome;
		
	}

	public function setEmail($email){
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			$this->email = $email;
		}
	}

	public function setTelefone($telefone){
		$this->telefone = $telefone;
	}

	public function setAssunto($assunto){
		$this->assunto = $assunto;
	}

	public function setMensagem($mensagem){
		$this->mensagem = $mensagem;
	}
	
	public function enviarContato(){

		$site = new Site();
		$item = $site->getArray();

		//$para    = $item['emails'];
		$para = 'alenilson@aleevolucoes.com.br';
		$subject = 'Site AleEvolucoes - '.$this->assunto;
		$message = "
		<html>
		<head>
		  <title>AleEvolucoes</title>
		</head>
		<body>
		  <table>
		    <tr>
		      <td>Nome: </td>
		      <td>".$this->nome."</td>
		    </tr>
		    <tr>
		      <td>E-mail: </td>
		      <td>".$this->email."</td>
		    </tr>
		    <tr>
		      <td>Assunto: </td>
		      <td>".$this->assunto."</td>
		    </tr>
		    <tr>
		      <td>Mensagem / Descrição do projeto:</td>
		      <td>".$this->mensagem."</td>
		    </tr>
		  </table>
		</body>
		</html>
		";
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "From: Site <site@aleevolucoes.com.br>\r\n";
		$headers .= "Content-type: text/html; charset=utf-8" . "\r\n";
		$headers .= "X-Mailer: PHP/" . phpversion ();

		// Proteção de limitação de cara
		$text = wordwrap($message, 70, "\r\n");

		mail($para, $subject, $text, $headers);
	}

	public function enviarOrcamento(){

		$site = new Site();
		$item = $site->getArray();

		$para    = $item['emails'];
		$subject = 'Pedido de Orçamento - '.$this->nome;
		$message = "
		<html>
		<head>
		  <title>AleEvolucoes</title>
		</head>
		<body>
		  <table>
		    <tr>
		      <td>Nome: </td>
		      <td>".$this->nome."</td>
		    </tr>
		    <tr>
		      <td>E-mail: </td>
		      <td>".$this->email."</td>
		    </tr>
		    <tr>
		      <td>Telefone: </td>
		      <td>".$this->telefone."</td>
		    </tr>
		    <tr>
		      <td>Mensagem</td>
		      <td>".$this->mensagem."</td>
		    </tr>
		  </table>
		</body>
		</html>
		";
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "From: Site <site@aleevolucoes.com.br>\r\n";
		$headers .= "Content-type: text/html; charset=utf-8" . "\r\n";
		$headers .= "X-Mailer: PHP/" . phpversion ();

		// Proteção de limitação de cara
		$text = wordwrap($message, 70, "\r\n");

		mail($para, $subject, $text, $headers);
	}
}


