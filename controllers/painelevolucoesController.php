<?php
class painelevolucoesController extends controller {

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

        $categorias = new EvolucoesCategoria();
        $dados['evolucoes'] = $categorias->getListCategoriaEEvolucoes(); 
        

        $dados['page'] = "evolucoes";
        
		
        $this->loadTemplateInPainel('painelevolucoes', $dados);
    }

    public function adicionar(){

        $dados = array();

        if(!empty($_POST['nome_projeto'])){
            $id_arquivo = 0;
            if(isset($_FILES['imagem']) && !empty($_FILES['imagem']['tmp_name'])){
                $imagem = $_FILES['imagem'];
                $arquivo = new Arquivos();
                $id_arquivo = $arquivo->guardarImagem($imagem);

            }

            $slug = new Slug();
            $texto = $slug->criar_slug($_POST['nome_projeto']);

            $evolucoes = new Evolucoes();
            $evolucoes->setNomeProjeto($_POST['nome_projeto']);
            $evolucoes->setSlug($texto);
            $evolucoes->setIdArquivo($id_arquivo);
            $evolucoes->setIdCategoria($_POST['id_categoria']);
            $evolucoes->setDescricao($_POST['descricao']);
            $evolucoes->salvar();
            header('Location:'.BASE_URL.'painelevolucoes');
            exit;
            

        }

        $categorias = new EvolucoesCategoria();
        $dados['categorias'] = $categorias->getList();

        $dados['page'] = "evolucoes";
        
        
        $this->loadTemplateInPainel('adicionarevolucao', $dados);
    }


    public function editar($id){

        $dados = array();

        if(!empty($_POST['nome_projeto'])){
            

            if(isset($_FILES['imagem']) && !empty($_FILES['imagem']['tmp_name'])){
                $imagem = $_FILES['imagem'];
                $id_arquivo = md5($_POST['id_arquivo']);
                $arquivo = new Arquivos();
                $id_arquivo = $arquivo->atualizaArquivo($id_arquivo, $imagem);

            }

            $slug = new Slug();
            $texto = $slug->criar_slug($_POST['nome_projeto']);

            $evolucoes = new Evolucoes();
            $evolucoes->setNomeProjeto($_POST['nome_projeto']);
            $evolucoes->setSlug($texto);
            $evolucoes->setIdCategoria($_POST['id_categoria']);
            $evolucoes->setDescricao($_POST['descricao']);
            $evolucoes->salvar($id);
            header('Location:'.BASE_URL.'painelevolucoes');
            exit;
            

        }

        $evolucao = new Evolucoes();
        $dados['evolucao'] = $evolucao->getListByIdEvolucoes($id);

        
        $categorias = new EvolucoesCategoria();
        $dados['categorias'] = $categorias->getList();

        $dados['page'] = "evolucoes";
        
        
        $this->loadTemplateInPainel('editarevolucao', $dados);
    }

    public function categorias(){

        $dados = array();

        if(!empty($_POST['nome'])){

            $categoria = new EvolucoesCategoria();
            $categoria->setNome($_POST['nome']);
            $categoria->setOrdem($_POST['ordem']);
            $categoria->salvar();
            header("Location:".BASE_URL.'painelevolucoes/categorias');
        }

        $categorias = new EvolucoesCategoria();
        $dados['categorias'] = $categorias->getListCategoriaEEvolucoes();

        $dados['page'] = "evolucoes";

        $this->loadTemplateInPainel('painelcategorias', $dados);
    }

    

    public function editarcategoria($id){

        $dados = array();

        if(!empty($_POST['nome'])){

            $categoria = new EvolucoesCategoria();
            $categoria->setNome($_POST['nome']);
            $categoria->setOrdem($_POST['ordem']);
            $categoria->salvar($id);
            header("Location:".BASE_URL.'painelevolucoes/categorias');
        }

        $categorias = new EvolucoesCategoria();
        $dados['categoria'] = $categorias->getList($id);

        $dados['page'] = "evolucoes";

        $this->loadTemplateInPainel('editarcategoria', $dados);
    }

    public function excluir($id){

        $evolucoes = new Evolucoes();
        $evolucoes->excluir($id);
        header('Location:'.BASE_URL.'painelevolucoes');
        exit;
    }

    public function excluircategoria($id_categoria){

        $categoria = new EvolucoesCategoria();
        if($categoria->verificarSeTemEvolucoes($id_categoria) == false){
            $categoria->excluir($id_categoria);
        }
        header("Location:".BASE_URL."painelevolucoes/categorias");
        exit;
    }
    

}