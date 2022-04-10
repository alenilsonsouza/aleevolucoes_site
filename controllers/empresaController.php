<?php
class empresaController extends controller {

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

        $dados['page'] = "empresa";
        $dados['titulo'] = "Empresa";

        $captcha = new Captcha();
        $captcha->init();
        $itens = $captcha->getCaptcha();
        $dados['n1'] = $itens['n1'];
        $dados['n2'] = $itens['n2'];
		
		
        $this->loadTemplate('empresa', $dados);
    }

}