<?php
class politicaprivacidadeController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = array();

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
        

        $template = new Template();
        $dados['info'] = $template->getInfo();

        $dados['page'] = "politicaprivacidade";
        $dados['titulo'] = "Política de Provacidade";

        $captcha = new Captcha();
        $captcha->init();
        $itens = $captcha->getCaptcha();
        $dados['n1'] = $itens['n1'];
        $dados['n2'] = $itens['n2'];
		
		
        $this->loadTemplate('politicaprivacidade', $dados);
    }

}