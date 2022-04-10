<?php
class loginController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();

    }

    

    public function index() {
        $dados = array();
        if(isset($_POST['email']) && !empty($_POST['email'])){
            $email = addslashes($_POST['email']);
            $senha = md5($_POST['senha']);
            
            $u = new Usuarios();
            if($u->fazerLogin($email, $senha)){
                header("Location: ".BASE_URL."painel");
            }else{
                $dados['aviso'] = "Usuário ou senha não conferem.";
            }
            
        }
		
		
        $this->loadViewInPainel('login', $dados);
    }


    public function sair(){

        $u = new Usuarios();
        $u->isLogged();
        $u->logout();
        
        header("Location: ".BASE_URL."login");
        exit;
        

        
    }

    

}