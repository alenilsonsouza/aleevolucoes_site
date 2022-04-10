<?php
class EmailSend extends model{

	private $nome;
	private $email;
	private $telefone;
	private $assunto;
    private $mensagem; 
    private $emailSend;

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

	public function setTelefone($telefone){
		if(filter_var($telefone, FILTER_SANITIZE_STRING)){
			$this->telefone = $telefone;
		}
	}

	public function setAssunto($assunto){
		if(filter_var($assunto, FILTER_SANITIZE_STRING)){
			$this->assunto = $assunto;
		}
	}

	public function setMensagem($mensagem){
		if(filter_var($mensagem, FILTER_SANITIZE_STRING)){
			$this->mensagem = $mensagem;
		}
    }
    
    public function setEmailSend($emailSend){
		if(filter_var($emailSend, FILTER_VALIDATE_EMAIL)){
			$this->emailSend = $emailSend;
		}
	}
	
	public function enviarContato(){

		$site = new Site();
		$item = $site->getArray();

		$para    = $this->emailSend;
		$assunto = $this->assunto;
		$subject = 'Web - '.$this->assunto;
		$message = "
		<html>
		<head>
		  <title>AleEvolucoes</title>
		</head>
		<body>
		<h1>Olá! Você recebeu esta mensagem!</h1>
		  <table style='border:1px solid #ccc; padding:10px;border-radius:7px; width:350px' cellpadding='10'>
		    <tr>
		      <td><strong>Nome:</strong> </td>
		      <td>".$this->nome."</td>
		    </tr>
		    <tr>
		      <td><strong>E-mail:</strong>  </td>
		      <td>".$this->email."</td>
		    </tr>
		    <tr>
		      <td><strong>Assunto:</strong>  </td>
		      <td>".$this->assunto."</td>
		    </tr>
		   
		    <tr>
		      <td><strong>Mensagem:</strong> </td>
		      <td>".$this->mensagem."</td>
            </tr>
            
          </table>
          <p style='font-style:italic'>Mensagem recebida do Webservice AleEvoluções.</p>
		</body>
		</html>
		";
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "From: Site <site@aleevolucoes.com.br>\r\n";
		$headers .= "Content-type: text/html; charset=utf-8" . "\r\n";
		$headers .= "X-Mailer: PHP/" . phpversion ();

		mail($para, $subject, $message, $headers);
	}

	public function enviarOrcamento(){

		$site = new Site();
		$item = $site->getArray();

		$para    = $item['emails'];
		$assunto = $this->assunto;
		$subject = 'Pedido de Orçamento - '.$this->assunto;
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

		mail($para, $subject, $message, $headers);
	}
}


