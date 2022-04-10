<?php
class homeController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = [];
        $_SESSION['formOrcamento'] = '';
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $tel = filter_input(INPUT_POST, 'tel');
        $option = filter_input(INPUT_POST, 'option');

        if($name && $email) {
            $subject = 'Vindo do Site - '. $name;
            $message = '<b>Nome: </b>'.$name.'<br/ >';
            $message .= '<b>Whatsapp:</b> '.$tel.'<br /><b>Interesse:</b> '.$option;
            $p = new PHPEmail();
            $response = $p->send($email, $subject, $message);
            $_SESSION['formOrcamento'] = $response;
        }

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

        $evolucoes = new Evolucoes();
        $dados['evolucoes'] = $evolucoes->getListRand();

        $config = new Config();
        $dados['config'] = $config->getArray();

        $b = new Banners();
        $dados['banners'] = $b->getArray();

        $v = new Video();
        $dados['video'] = $v->getArray(); 
        
        $template = new Template();
        $dados['info'] = $template->getInfo();
        $dados['page'] = "home";
        $dados['titulo'] = "Sistemas e Sites";

        $captcha = new Captcha();
        $captcha->init();
        $itens = $captcha->getCaptcha();
        $dados['n1'] = $itens['n1'];
        $dados['n2'] = $itens['n2'];

        $dados['homemenu'] = 'home';
		
        $this->loadTemplate('home', $dados);
    }

}