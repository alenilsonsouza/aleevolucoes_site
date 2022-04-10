<?php
class evolucoesController extends controller {

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

        $categorias = new EvolucoesCategoria();
        $dados['evolucoes'] = $categorias->getListCategoriaEEvolucoes();  

        $template = new Template();
        $dados['info'] = $template->getInfo();

        $dados['page'] = "evolucoes";
        $dados['titulo'] = "Evoluções";

        $captcha = new Captcha();
        $captcha->init();
        $itens = $captcha->getCaptcha();
        $dados['n1'] = $itens['n1'];
        $dados['n2'] = $itens['n2'];
		
		
        $this->loadTemplate('evolucoes', $dados);
    }

    public function projeto($slug='') {
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

        $evolucoes = new Evolucoes();
        $dados['evolucao'] = $evolucoes->getEvolucaoBySlug($slug); 
        $dados['proximo'] = $evolucoes->next($dados['evolucao']['id_evolucao']);
        $dados['anterior'] = $evolucoes->preview($dados['evolucao']['id_evolucao']);

        $template = new Template();
        $dados['info'] = $template->getInfo();

        $dados['projetoNome'] = $dados['evolucao']['nome_projeto'];

        $dados['page'] = "evolucoes"; 
        $dados['titulo'] = "Evoluções";

        $captcha = new Captcha();
        $captcha->init();
        $itens = $captcha->getCaptcha();
        $dados['n1'] = $itens['n1'];
        $dados['n2'] = $itens['n2'];
        
        
        $this->loadTemplate('projeto', $dados);
    }

}