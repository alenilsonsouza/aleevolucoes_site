<?php
class painelduvidasController extends controller {

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

        $duvidas = new Duvidas(); 

        $limit = 20;

        $total = $duvidas->getTotal(); 

        $dados['paginas'] = ceil($total/$limit);

        $dados['paginaAtual'] = 1;
        if(!empty($_GET['p'])){
            $dados['paginaAtual'] = intval($_GET['p']);
        }
        
        $offset = ($dados['paginaAtual'] * $limit) - $limit;
        $dados['duvidas'] = $duvidas->getList($offset, $limit);

        
        $dados['page'] = "duvidas";
		
        $this->loadTemplateInPainel('painelduvidas', $dados);
    }

    public function adicionar() {
        $dados = array();

        if(!empty($_POST['pergunta'])){

            $duvidas = new Duvidas();
            $duvidas->setPergunta($_POST['pergunta']);
            $duvidas->setResposta($_POST['resposta']);
            $duvidas->salvar();
            header("Location:".BASE_URL.'painelduvidas');
            exit;

        }
        
        
        $dados['page'] = "duvidas";
        $this->loadTemplateInPainel('adicionarduvida', $dados);
    }


    public function editar($id) {
        $dados = array();

        if(!empty($_POST['pergunta'])){

            $duvidas = new Duvidas();
            $duvidas->setPergunta($_POST['pergunta']);
            $duvidas->setResposta($_POST['resposta']);
            $duvidas->salvar($id);
            header("Location:".BASE_URL.'painelduvidas');
            exit;

        }

        $duvidas = new Duvidas();
        $dados['duvida'] = $duvidas->getDuvidaById($id);

        $dados['page'] = "duvidas";
        
        
        $this->loadTemplateInPainel('editarduvida', $dados);
    }

    public function excluir($id) {
        
        $duvidas = new Duvidas();
        $duvidas->delete($id);
        header('Location:'.BASE_URL.'painelduvidas');
        exit;
    }
    

}