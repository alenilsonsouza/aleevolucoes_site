<?php
class ajaxController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = array();

        
		
		
    }

    public function consultar_cep(){

        $cep = $_POST['cep'];
 
        $reg = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $cep);
         
        $dados['sucesso'] = (string) $reg->resultado;
        $dados['rua']     = (string) $reg->tipo_logradouro . ' ' . $reg->logradouro;
        $dados['bairro']  = (string) $reg->bairro;
        $dados['cidade']  = (string) $reg->cidade;
        $dados['estado']  = (string) $reg->uf;
         
        echo json_encode($dados);
    }

    public function pesquisaduvida(){

        $dados = array();

        $duvidas = new Duvidas(); 

        $limit = 20;

        $total = $duvidas->getTotal(); 

        $dados['paginas'] = ceil($total/$limit);

        $dados['paginaAtual'] = 1;
        if(!empty($_GET['p'])){
            $dados['paginaAtual'] = intval($_GET['p']);
        }
        if(!empty($_GET['pesquisa'])){
            $pesquisa = $_GET['pesquisa'];
        }else{
            $pesquisa='';
        }
        $dados['pesquisa'] = $pesquisa;
        
        $offset = ($dados['paginaAtual'] * $limit) - $limit;
        $dados['duvidas'] = $duvidas->getList($offset, $limit, $pesquisa);

        $this->loadViewInTemplate('pesquisaduvida',$dados);
    }

}