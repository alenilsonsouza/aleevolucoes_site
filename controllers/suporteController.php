<?php
class suporteController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = array();

        

        

        
        $template = new Template();
        $dados['info'] = $template->getInfo();
        $dados['page'] = "suporte";
        $dados['titulo'] = "Sistemas e Sites";

       

        //$dados['homemenu'] = 'home';
		
		
        $this->loadTemplate('suporte', $dados);
    }

}