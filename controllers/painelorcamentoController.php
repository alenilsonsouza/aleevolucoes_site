<?php
class painelorcamentoController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();

        $u = new Usuarios();
        if(!$u->isLogged()){
            header("Location: ".BASE_URL."login");
        }
        
    }

    public function index() {
        $dados = array();

        $orcamento = new Orcamento(); 

        $limit = 20;

        $total = $orcamento->getTotal(); 

        $dados['paginas'] = ceil($total/$limit);

        $dados['paginaAtual'] = 1;
        if(!empty($_GET['p'])){
            $dados['paginaAtual'] = intval($_GET['p']);
        }
        
        $offset = ($dados['paginaAtual'] * $limit) - $limit;
        $dados['orcamentos'] = $orcamento->getList($offset, $limit);

        
        $dados['page'] = "orcamento";
		
        $this->loadTemplateInPainel('painelorcamento', $dados);
    }

    

}