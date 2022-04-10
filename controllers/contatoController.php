<?php
class contatoController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = array('aviso'=>''); 
        $captcha = new Captcha();

        //Orçamento
        $captcha = new Captcha();
        if(!empty($_POST['captchap'])){
            if($captcha->verificar($_POST['captchap'])){
                if(!empty($_POST['nome_orcamento'])){

                    $orcamento = new Orcamento();
                    $orcamento->setNome($_POST['nome_orcamento']);
                    $orcamento->setEmail($_POST['email_orcamento']);
                    $orcamento->setCelular($_POST['telefone_orcamento']);
                    $orcamento->setMensagem($_POST['mensagem_orcamento']);
                    $orcamento->salvar();
        
                    $template = new Template();
                    $dados['dados'] = $template->getDados();
                }
            }
        }

        //Contato
        
        if(!empty($_POST['captcha'])){
            if($captcha->verificar($_POST['captcha'])){
                if(!empty($_POST['nome'])){
                    $contato = new Contato();
                    $contato->setNome($_POST['nome']);
                    $contato->setEmail($_POST['email']);
                    $contato->setAssunto($_POST['assunto']);
                    $contato->setMensagem($_POST['mensagem']);
                    $contato->salvar();
                    $dados['aviso'] = "Sua mensagem foi enviada! Entraremos em contato em breve";
                }
            }else{
                $dados['aviso'] = "A soma do captcha não acertou!";
                $dados['aviso'] .= '<br><a href="'.BASE_URL.'contato">Voltar</a>';
            }
            
        }

        $template = new Template();
        $dados['info'] = $template->getInfo();
        

        $dados['page'] = "contato";
        $dados['titulo'] = "Contato";

        
        $captcha->init();
        $itens = $captcha->getCaptcha();
        $dados['n1'] = $itens['n1'];
        $dados['n2'] = $itens['n2'];
		
		
        $this->loadTemplate('contato', $dados);
    }

}